<?php
include 'php/connection.php';

class User {
    private int $id;
    private string $name;
    private string $user;
    private string $email;
    private bool $hasProfilePic;

    public function get_id() { return $this->id;}
    public function get_name() { return $this->name;}
    public function get_user() { return $this->user;}
    public function get_email() { return $this->email;}
    public function get_hasProfilePic() { return $this->hasProfilePic;}

    protected function __construct($id, $name, $user, $email, $hasProfilePic) {
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
        $this->email = $email;
        $this->hasProfilePic = $hasProfilePic;
    }
}

class Session extends User {
    private function __construct($id, $name, $user, $email, $hasProfilePic) {
        parent::__construct($id, $name, $user, $email, $hasProfilePic);
    }

    public function update(?string $name, ?string $user) {
        $fields = [];
        $values = [];


    }

    public function set_photo($file): SetPhotoResult {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file["tmp_name"]);
        finfo_close($finfo);

        $allowed = false;
        $split = str_split($mime);
        $allowed_types = ['jpg', "jpeg", 'png', 'gif'];
        foreach ($split as $value) {
            if (in_array(strtolower($value), $allowed_types)) {
                $allowed = true;
                break;
            }
        }

        if ($allowed) {
            try {
                move_uploaded_file($file['tmp_name'], "data/profile_pictures/{$this->get_id()}");
            } catch (error) {
                return new SetPhotoResult("Erro ao tentar salvar imagem.");
            }
            global $connection;
            $stmt = $connection->prepare("UPDATE users SET photo = 1 WHERE id = ?");
            $id = $this->get_id();
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return new SetPhotoResult();
        } else {
            return new SetPhotoResult("Tipo de imagem incorreto");
        }
    }

    public function remove_photo(): SetPhotoResult {
        $result = false;

        try {
            $result = unlink("data/profile_pictures/{$this->get_id()}");
        } catch(err) {}

        if (!$result) {
            return new SetPhotoResult("Erro ao apagar foto");
        }

        global $connection;
        $stmt = $connection->prepare("UPDATE users SET photo = 0 WHERE id = ?");
        $id = $this->get_id();
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return new SetPhotoResult();
    }

    public static function login(string $userMail, string $password): LoginResult {
        $loginType = str_contains($userMail, "@")
            ? "email"
            : "user";
        
        global $connection;
        $sql = "SELECT * FROM users WHERE $loginType = ?";
        
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $userMail);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return new LoginFailure("Usuário não encontrado. ($loginType=$userMail)");
        }

        $user = $result->fetch_assoc();

        if (!password_verify($password, $user['password'])) {
            return new LoginFailure("Senha incorreta.");
        }

        return new LoginSuccess(
            new Session(
                $user["id"],
                $user["name"],
                $user["user"],
                $user["email"],
                (bool)$user["photo"]
            )
        );
    }

    public static function register(string $name, string $user, string $email, string $password): LoginResult {
        global $connection;
        $sql = "SELECT * FROM users WHERE user = ? OR email = ?";

        $stmt = $connection->prepare($sql);

        $stmt->bind_param("ss", $user, $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();

            $error_message = "";

            $emailMatches = $userData["email"] == $email;
            $userMatches = $userData["user"] == $user;

            if ($emailMatches && $userMatches) {
                $error_message = "E-mail e nome de usuário já existem.";
            } else if ($emailMatches) {
                $error_message = "E-mail já existe.";
            } else if ($userMatches) {
                $error_message = "Nome de usuário já existe.";
            }

            return new LoginFailure($error_message);
        }

        $sql = "INSERT INTO users (name, user, email, password) VALUES (?, ?, ?, ?)";

        $stmt = $connection->prepare($sql);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt->bind_param("ssss", $name, $user, $email, $passwordHash);
        $stmt->execute();

        $result = $stmt->get_result();

        return new LoginSuccess(
            new Session(
                $stmt->insert_id,
                $name,
                $user,
                $email,
                false
            )
        );
    }
}
/// user -> [a-z][A-Z][0-9][_][-][.]

abstract class LoginResult {
    public Session $session;
    public Exception $error;
}

class LoginSuccess extends LoginResult {
    public Session $session;
    public Exception $error;

    public function __construct(Session $session) {
        $this->session = $session;
    }
}

class LoginFailure extends LoginResult {
    public Session $session;
    public Exception $error;

    public function __construct(string $error) {
        $this->error = new Exception($error);
    }
}

class SetPhotoResult {
    private bool $okay;
    private Exception $error;

    public function __construct(?string $error = null) {
        $this->okay = $error == null;
        if ($error != null) {
            $this->error = new Exception($error);
        }
    }
}