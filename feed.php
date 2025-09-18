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
                <p>Nome do usuário</p>
            </div>

            <img src="img/franca.jpg" alt="Imagem do post" id="img-post">

            <div class="interacoes-post">
                <i class="fa-regular fa-heart"></i>
                <p>205</p>
                <i class="fa-regular fa-comment"></i>
                12
            </div>

            <div class="descricao-post">
                <h1>Título</h1>
                <p>Descrição</p>
            </div>
        </div>

    </main>
</body>
</html>