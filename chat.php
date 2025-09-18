<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/HW-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/chat.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Chat</title>
</head>
<body>
    <div class="container">
        <div class="caixa-chat">
            <div class="cabecalho">
                <h3 class="titulo">CHAT</h3>
            </div>
            
            <div class="mensagens">
                <div class="mensagem entrada">
                    <img class="foto" src="./img/user.png" alt="Foto do usuário">
                    <div class="conteudo-mensagem">
                        <div class="info">
                            <span class="nome">liliv</span>
                            <span class="hora">23 Jan 2:00 pm</span>
                        </div>
                        <div class="texto">
                            dghfdg hghdfg trhhdrjthg sidjkgherd jhfgisdjfkx hgi dtjkfghvnos ildtjxk hvbli ntdxkj gchn
                        </div>
                    </div>
                </div>

                <div class="mensagem direita">
                    <div class="conteudo-mensagem">
                        <div class="info">
                            <span class="nome">lin</span>
                            <span class="hora">23 Jan 2:05 pm</span>
                        </div>
                        <div class="texto">
                            sdhfkj ghdti jkfghs itdjk hgtidk jhsk
                        </div>
                    </div>
                    <img class="foto" src="./img/user.png" alt="Foto do usuário">
                </div>

                <div class="mensagem entrada">
                    <img class="foto" src="./img/user.png" alt="Foto do usuário">
                    <div class="conteudo-mensagem">
                        <div class="info">
                            <span class="nome">gabs</span>
                            <span class="hora">23 Jan 5:37 pm</span>
                        </div>
                        <div class="texto">
                            gdsdg jduogjd ligkj dojg skjdgkj sdgds hdfhgfx hbxgfbxg bgxbx
                        </div>
                    </div>
                </div>

                <div class="mensagem direita">
                    <div class="conteudo-mensagem">
                        <div class="info">
                            <span class="nome">lin</span>
                            <span class="hora">23 Jan 6:10 pm</span>
                        </div>
                        <div class="texto">
                            sdrgxfgxd sfdfa
                        </div>
                    </div>
                    <img class="foto" src="./img/user.png" alt="Foto do usuário">
                </div>
            </div>
            
            <div class="rodape">
                <form action="#" method="post">
                    <div class="grupo-input">
                        <input type="text" name="mensagem" placeholder="digite ..." class="campo">
                        <button type="button" class="botao botao-azul">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #282a32;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 800px;
    display: flex;
    justify-content: center;
}

.caixa-chat {
    width: 100%;
    border-radius: 10px;
    background-color: rgb(48, 50, 54);
    border-top: 9px solid #162196;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 90vh;
}

.cabecalho {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #3a3d45;
    flex-shrink: 0;
}

.titulo {
    color: white;
    font-size: 24px;
    font-weight: bold;
}

.mensagens {
    padding: 20px;
    overflow-y: auto;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.mensagens::-webkit-scrollbar {
    width: 8px;
}

.mensagens::-webkit-scrollbar-track {
    background: #3a3d45;
    border-radius: 10px;
}

.mensagens::-webkit-scrollbar-thumb {
    background: #162196;
    border-radius: 10px;
}

.mensagem {
    display: flex;
    max-width: 100%;
}

.mensagem.entrada {
    align-self: flex-start;
}

.mensagem.direita {
    align-self: flex-end;
}

.foto {
    border-radius: 50%;
    width: 45px;
    height: 45px;
    object-fit: cover;
    flex-shrink: 0;
}

.conteudo-mensagem {
    display: flex;
    flex-direction: column;
    max-width: 70%;
}

.mensagem.entrada .conteudo-mensagem {
    margin-left: 10px;
}

.mensagem.direita .conteudo-mensagem {
    margin-right: 10px;
    align-items: flex-end;
}

.info {
    margin-bottom: 5px;
    display: flex;
    gap: 10px;
}

.mensagem.direita .info {
    flex-direction: row-reverse;
}

.nome {
    color: white;
    font-size: 14px;
    font-weight: 600;
}

.hora {
    color: #a0a0a0;
    font-size: 12px;
    align-self: center;
}

.texto {
    border-radius: 18px;
    padding: 12px 15px;
    color: #444;
    font-size: 15px;
    line-height: 1.4;
    word-wrap: break-word;
    max-width: fit-content;
}

.mensagem.entrada .texto {
    background: #d2d6de;
    border: 1px solid #d2d6de;
    border-top-left-radius: 5px;
}

.mensagem.direita .texto {
    background: #162196;
    border: 1px solid #162196;
    color: #fff;
    border-top-right-radius: 5px;
}

.rodape {
    padding: 15px;
    border-top: 1px solid #3a3d45;
    flex-shrink: 0;
}

.grupo-input {
    display: flex;
    gap: 10px;
}

.campo {
    flex: 1;
    height: 45px;
    border: 1px solid #3a3d45;
    border-radius: 5px;
    padding: 0 15px;
    font-size: 16px;
    background-color: #3a3d45;
    color: white;
}

.campo:focus {
    outline: none;
    border-color: #162196;
}

.campo::placeholder {
    color: #a0a0a0;
}

.botao {
    border-radius: 5px;
    border: none;
    height: 45px;
    padding: 0 20px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
}

.botao-azul {
    color: #fff;
    background-color: #162196;
}

.botao-azul:hover {
    background-color: #1a29b0;
}

@media (max-width: 600px) {
    .caixa-chat {
        border-top-width: 6px;
        height: 95vh;
    }
    
    .mensagens {
        padding: 15px;
        gap: 12px;
    }
    
    .conteudo-mensagem {
        max-width: 75%;
    }
    
    .texto {
        font-size: 14px;
        padding: 10px 12px;
    }
    
    .foto {
        width: 40px;
        height: 40px;
    }
    
    .grupo-input {
        flex-direction: column;
    }
    
    .botao {
        width: 100%;
    }
}
</style>