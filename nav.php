<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>NotInstagram</title>
</head>

<body id="body-nav">
    <div class="layout">
        <nav>
            <div class="topo-nav">
                <h1>NotInstagram</h1>
            </div>
            <div class="lista-nav">
                <ul>
                    <li><i class="fa-solid fa-house"></i><a href="feed.php">Feed</a></li>
                    <li><i class="fa-solid fa-comment"></i><a href="chat.php">Chat</a></li>
                    <li><i class="fa-solid fa-square-plus"></i><a href="post.php">Publicar</a></li>
                    <li><i class="fa-solid fa-right-from-bracket"></i><a href="index.php">Sair</a></li>
                </ul>
            </div>
            <div class="perfil-nav">
                <img src="img/user.png" alt="" id="user-nav">
                <div>
                    <p>Lin da Silva</p>
                    <a href="">Meu perfil <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
        </nav>
    </div>
</body>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #body-nav {
        font-family: 'Montserrat', sans-serif;
        background-color: #282a32;
        color: white;
    }

    .layout {
        display: flex;
    }

    nav {
        position: sticky;
        border-right: 1px solid #ffffff5e;
        width: 250px;
        height: 100vh;
        left: 0;
        top: 0;
    }

    .topo-nav {
        padding: 20px;
        color: white;
    }

    .lista-nav {
        margin-top: 50px;
    }

    .lista-nav ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 25px;
        padding-left: 0;
    }

    .lista-nav ul li {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .lista-nav ul li i {
        margin-right: 20px;
        font-size: 20px;
        color: white;
    }

    .lista-nav ul li a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        font-weight: 500;
        display: block;
    }

    .perfil-nav {
        position: absolute;
        bottom: 0;
        width: 100%;
        color: white;
        margin: 10px 10px 25px 10px;
        display: flex;
    }

    .perfil-nav div {
        margin-left: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .perfil-nav div p {
        font-size: 16px;
        font-weight: 600;
        color: white;
        margin-bottom: 2px;
    }

    .perfil-nav div a {
        font-size: 14px;
        color: #ffffffb3;
        text-decoration: none;
    }

    .perfil-nav div a i {
        margin-left: 3px;
        font-size: 12px;
    }

    .perfil-nav img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>

</html>