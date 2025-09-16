<?php
include '../php/connection.php';

class User {
    private int $id;
    private string $name;
    private string $user;
    private string $email;
    private bool $hasProfilePic;

    public function __construct($id, $name, $user, $email, $hasProfilePic) {
        $this->$id = $id;
        $this->$name = $name;
        $this->$user = $user;
        $this->$email = $email;
        $this->$hasProfilePic = $hasProfilePic;
    }
}

class Session extends User {

    private function __construct($id, $name, $user, $email, $hasProfilePic) {
        parent::__construct($id, $name, $user, $email, $hasProfilePic);
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
    public ?Session $session;
    public ?Exception $error;
}

class LoginSuccess extends LoginResult {
    public Session $session;
    public null $error;

    public function __construct(Session $session) {
        $this->session = $session;
    }
}

class LoginFailure extends LoginResult {
    public null $session;
    public Exception $error;

    public function __construct(string $error) {
        $this->error = new Exception($error);
    }
}