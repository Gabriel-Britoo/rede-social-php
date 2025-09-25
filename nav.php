<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <title>NotInstagram</title>
</head>

<body id="body-nav">
    <div class="layout">
        <nav>
            <div class="nav-topo-lista">
                <div class="topo-nav">
                    <img src="img/conex.png" alt="Logo">
                </div>
                <div class="lista-nav">
                    <ul>
                        <li><i class="fa-solid fa-house"></i><a href="feed.php">Feed</a></li>
                        <li><i class="fa-regular fa-comment"></i><a href="chat.php">Chat</a></li>
                        <li><i class="fa-regular fa-square-plus"></i><a href="postar.php">Publicar</a></li>
                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="index.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="perfil-nav">
                <img src="img/user.png" alt="" id="user-nav">
                <div>
                    <p><?php echo $_SESSION["session"]->get_user(); ?></p>
                    <a href="perfil.php">Meu perfil <i class="fa-solid fa-chevron-right"></i></a>
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .topo-nav {
        padding: 20px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0e1e99;
        background: linear-gradient(90deg, rgba(18, 28, 98, 1) 0%, rgba(73, 90, 221, 1) 100%);
        border-radius: 10px;
        margin: 10px;
    }

    .topo-nav img {
        width: 150px;
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
        padding: 20px;
        margin: 10px;
        color: white;
        display: flex;
        background-color: #1d1e21;
        border-radius: 10px;
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