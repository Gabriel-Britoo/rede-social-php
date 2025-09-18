<?php
include 'features/posts.php';
include 'features/users.php';

session_start();

$posts = Post::feed($_SESSION["session"], 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/feed.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Noto+Serif+Old+Uyghur&display=swap" rel="stylesheet">
    <title>Explorar</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="posts">

        <div id="post">
            <div class="topo-post">
                <img src="img/user.png" alt="Foto de perfil do usuário">
                <p id="nome">jana_montserrat</p>
                <p id="em">em</p>
                <p id="data">10/09/2025</p>
            </div>

            <img src="img/franca.jpg" alt="Imagem do post" id="img-post">

            <div class="interacoes-post">
                <i class="fa-regular fa-heart"></i>
                <p>205</p>
                <i class="fa-regular fa-comment"></i>
                <p>12</p>
            </div>

            <div class="descricao-post">
                <h1>#por_aí</h1>
                <p>foto do quintal de casa rs</p>
            </div>
        </div>

        <div id="post">
            <div class="topo-post">
                <img src="img/user.png" alt="Foto de perfil do usuário">
                <p id="nome">pedrxxc01</p>
                <p id="em">em</p>
                <p id="data">12/08/2025</p>
            </div>

            <img src="img/trilha.jpg" alt="Imagem do post" id="img-post">

            <div class="interacoes-post">
                <i class="fa-solid fa-heart" style="color: #729cffff;"></i>
                <p>57</p>
                <i class="fa-regular fa-comment"></i>
                <p>4</p>
            </div>

            <div class="descricao-post">
                <h1>Trilha pra desestressar</h1>
                <p>Quase morremo slk kkkkk</p>
            </div>
        </div>

        <div id="post">
            <div class="topo-post">
                <img src="img/user.png" alt="Foto de perfil do usuário">
                <p id="nome">soled_byCucaBeludo</p>
                <p id="em">em</p>
                <p id="data">20/08/2025</p>
            </div>

            <img src="img/fogo.jpg" alt="Imagem do post" id="img-post">

            <div class="interacoes-post">
                <i class="fa-regular fa-heart"></i>
                <p>999</p>
                <i class="fa-regular fa-comment"></i>
                <p>000</p>
            </div>

            <div class="descricao-post">
                <h1>Achou que todos os posts eram bonitinhos né kkkk</h1>
                <p>Cuidado quando for tentar rodar GTA 6 no PC com 8 de RAM e um processador i5, os cara falou que não tinha problema kkkkjkjkjkkkk</p>
            </div>
        </div>

    </main>
</body>
</html>