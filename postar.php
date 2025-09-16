<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/postar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Postar</title>
</head>
<body>
    <div class="container-central">
        <div class="container-login">
            <div class="aba-login">
                <span class="icone-login"><i class='bx bx-log-in'></i></span>
                <span class="titulo-login">POSTAR</span>
                <span class="pontos-login">•••</span>
            </div>
            <form class="formulario-login">
                <label for="titulo">TÍTULO DA PUBLICAÇÃO</label>
                <input type="text" id="titulo" name="titulo" required>
                <label for="descricao">DESCRIÇÃO</label>
                <input type="text" id="descricao" name="descricao" required>
                <label for="foto">UPLOAD DE FOTO</label>
                <input type="file" id="foto" name="foto" accept="image/*" required>
                <button type="submit" class="btn-postar">POSTAR</button>
            </form>
        </div>
    </div>
</body>
</html>