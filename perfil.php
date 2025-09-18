<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/HW-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/perfil.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Perfil</title>
</head>
<body>

<main class="main-content">
    <div class="pagina-perfil">
        <div id="fundo">
            <img id="banner-histweb" src="img/HistWebWhite.svg" alt="">
            <p id="nome-usuario">Olá, &lt;Nome&gt;</p>
        </div>
        <form class="informacoes" action="#">
            <img id='user-perfil' src='./img/user.png' alt=''>
            
            <div class='info'>
                <div class='nome-email'>
                    <input type="hidden" name="id" value="#">
                    <label class="nome-acima" for="upload">IMAGEM</label>
                    <input id="upload" type="file" name="imagem" accept="image/*">
                    <label class='nome-acima'>NOME</label>
                    <input id='campo-nome' name="nome" type='text' value='#'>
                    <label class='nome-acima'>NOME DE USUARIO</label>
                    <input id='campo-nome' name="nome" type='text' value='#'>
                    <label class='nome-acima'>SENHA</label>
                    <input id='campo-senha' name="senha" type='password' placeholder="Nova senha">
                    <div id='mostrar'>
                        <input type='checkbox' onclick='mostrarSenha()'> Mostrar senha
                    </div>
                    <button type="submit" id="confirma">Confirmar alterações</button>
                </div>
            </div>
            <p>Lista de amigos</p>
            <p class="nome-amigo">Nome do amigo1</p>
            <img id='user-perfil-pequeno' src='./img/user.png' alt=''>
            <p class="nome-amigo">Nome do amigo2</p>
            <img id='user-perfil-pequeno' src='./img/user.png' alt=''>
            <p class="nome-amigo">Nome do amigo3</p>
            <img id='user-perfil-pequeno' src='./img/user.png' alt=''>
            
        </form>
    </div>
</main>
<script>
    function mostrarSenha() {
        var x = document.getElementById("campo-senha");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>