<?php
session_start();
include "features/users.php";

$error_message = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password'])) {
        $result = Session::register(
            $_POST["name"],
            $_POST["user"],
            $_POST["email"],
            $_POST["password"],
        );

        if ($result instanceof LoginSuccess) {
            $_SESSION["session"] = $result->session;
            header("Location: feed.php");
            exit;
        } else if ($result instanceof LoginFailure) {
            $error_message = $result->error;
        }
    } else {
        $error_message = "Parâmetros insuficientes";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Noto+Serif+Old+Uyghur&display=swap" rel="stylesheet">
    <title>Cadastrar-se</title>
</head>
<body>
    <img src="img/cadastro.png" alt="imagem abstrata">
    <div class="form-box"> 
        <h1>Cadastrar</h1>
        <h2>Insira suas credenciais para criar uma nova conta</h2>
        <form action="" method="POST">
            <!-- <label for="">Foto de perfil</label>
            <input type="file" name="profile_picture" id="file-input"> -->
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="Nome">
            <label for="name">Nome de Usuário</label>
            <input type="text" name="user" placeholder="Nome de Usuário" pattern="[a-zA-Z0-9\.\-_]+">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="E-mail">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha">
            <button type="submit">Cadastrar</button>
            <?php
            if ($error_message) {
                echo "<p id=\"error-message\">$error_message</p>";
            }
            ?>
        </form>
        <p>Já possui uma conta? <a href="index.php">Entre</a></p>
    </div>
</body>
</html>