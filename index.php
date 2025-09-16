<?php
session_start();
include 'features/users.php';

$error_message = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST["password"])) {
        $result = Session::login($_POST['email'], $_POST['password']);

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
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Noto+Serif+Old+Uyghur&display=swap" rel="stylesheet">
    <title>Entrar</title>
</head>
<body>
    <div class="form-box"> 
        <h1>Entrar</h1>
        <h2>Insira suas credenciais para acessar sua conta</h2>
        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="E-mail">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha">
            <button type="submit">Entrar</button>
        </form>
        <p>Não possui uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
    <img src="img/login.png" alt="imagem abstrata">
</body>
</html>