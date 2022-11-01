<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Area de Cadastro</title>
    <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="css/style_musicas.css">
    <script src="js/menus.js" defer></script>
    <script src="https://unpkg.com/wavesurfer.js"></script>
</head>
<body>
    <?php
    $nomeErr = $emailErr = $usuarioErr = $senhaErr = $csenhaErr = "";
    $nome = $email = $usuario = $csenha = $senha = "";
    $str="AreaConta.php";
    if ($_POST) {
        if (empty($_POST["nome"])) {
          $nomeErr = "Nome é necessário";
        } elseif(!preg_match("/^[a-zA-Z\s]+$/",$_POST["nome"])) {
            $nome = test_input($_POST["nome"]);
            $nomeErr = "Apenas letras e espaços são permitidos para nomes";
        } else {
            $nome = test_input($_POST["nome"]);
        }
        
        if (empty($_POST["email"])) {
          $emailErr = "E-mail é necessário";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = test_input($_POST["email"]);
            $emailErr = "Formato inválido de e-mail";
        } else {
            $email = test_input($_POST["email"]);
        }
          
        if (empty($_POST["usuario"])) {
          $usuarioErr = "Nome de usuário necessário";
        } else {
            $usuario = test_input($_POST["usuario"]);
        }

        if (empty($_POST["senha"])) {
          $senhaErr = "Senha é necessária";
        } else {
            $senha = test_input($_POST["senha"]);
        }
      
        if (empty($_POST["csenha"])) {
            $csenhaErr = "Necessária confirmação de senha";
        } elseif (strcmp($_POST["csenha"], $_POST["senha"])!=0) {
            $csenhaErr = "Senhas diferentes";
        } else {
            $csenha = test_input($_POST["csenha"]);
        }
        
      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    <div class="container2">  <!--  <<<<<--style_musicas -->
        <div class="divfr">  <!-- LOGO CYBERPUNK -->
            <a href="index.html" class="logo"> <img src="img/Cb2077.png" id="NCTlogo"> </a>
        </div>
        
        <div class="divfr">   <!-- FAIXA DE MÚSICA -->
                <div class="hero">  
                    <div class="music">
                        <img src="img/musicas/fotomusica.jfif" alt="Carregando" id="imgMusica">
                        <div class="info">
                            <h2 id="nomemusica">Cyberpunk 2077 - Theme music (1/7)</h2>
                
                            <div id="waveform"></div>
                
                            <div class="controls">
                                <img src="img/musicas/play.png" alt="Play" id="playBtn">
                                <img src="img/musicas/previous.png" alt="Pause" id="previousBtn" style="width: 14px;" class="espaco">
                                <img src="img/musicas/stop.png" alt="Pause" id="stopBtn">
                                <img src="img/musicas/next.png" alt="Pause" id="nextBtn" style="width: 14px;">
                                

                                <img src="img/musicas/volume.png" alt="Volume" id="volumeBtn" class="espaco">
                                <img src="img/musicas/minus.png" alt="Minus" id="minusBtn">
                                <progress id="progresso" value="0.05" max="0.1" style="margin-right: 15px;"></progress>
                                <img src="img/musicas/plus.webp" alt="Plus" id="plusBtn">
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="divfr">  <!-- MENU INTERATIVO -->
            <ul class="navbar_menu">  
                <li class="navbar_item">
                    <a href="index.html">Home</a>
                </li>
                <li class="navbar_item">
                    <a href="#" class="dropdown">Menu</a>
                    <div class="submenu">  <!-- MENU DROPDOWN -->
                        <img src="img/menufoto.jpg" alt="Imagem">
                        <div class="submenu_itens">
                            <div class="submenu_item" onclick="location.href='index.html#sec';">
                                <p><i>Icone</i></p>
                                <h4>Sobre</h4>
                            </div>
                            <div class="submenu_item" onclick="location.href='Explorar.html';">
                                <p><i>Icone</i></p>
                                <h4>Explorar</h4>
                            </div>
                            <div class="submenu_item" onclick="location.href='Mapa.html';">
                                <p><i>Icone</i></p>
                                <h4>Mapa</h4>
                            </div>
                            <div class="submenu_item" onclick="location.href='AreaCadastro.php';">
                                <p><i>Icone</i></p>
                                <h4>Notícias</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="navbar_item">
                    <a href="https://www.cyberpunk.net/us/pt-br/" target="_blank">Official Site</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sec">
        <div class="sec">
            <h2 class="titulo"> Cadastro de conta</h2>
            <form name="logar" method="post" action="<?php 
                if(!empty($_POST["nome"]) and !empty($_POST["email"]) and !empty($_POST["usuario"]) and !empty($_POST["senha"]) and !empty($_POST["csenha"])){
                    if ( strcmp($_POST["csenha"], $_POST["senha"])==0){
                        echo htmlspecialchars($str);
                        $x=1;
                    }
                } else {
                    echo htmlspecialchars($_SERVER["PHP_SELF"]);
                    $x=0;
                }            
            ?>">
                <p>Nome <span class="error" id="msg">*<?php if(isset($nomeErr)) echo $nomeErr;?></span></p>
                <input type="text" name="nome" id="nome" value="<?php if(isset($nome)) echo $nome;?>">
                <br>

                <p>Usuário <span class="error" id="msg">*<?php if(isset($usuarioErr)) echo $usuarioErr;?></span></p>
                <input type="text" name="usuario" id="usuario" value="<?php if(isset($usuario)) echo $usuario;?>">
                <br>

                <p>E-mail <span class="error" id="msg">*<?php if(isset($emailErr)) echo $emailErr;?></span></p>
                <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email;?>">
                <br>

                <p>Senha <span class="error" id="msg">*<?php if(isset($senhaErr)) echo $senhaErr;?></span></p>
                <input type="password" name="senha" id="senha" value="<?php if($x==1) {
                    echo $senha;
                    }
                    ?>">
                <br>

                <p>Confirmar senha <span class="error" id="msg">*<?php if(isset($csenhaErr)) echo $csenhaErr;?></span></p>
                <input type="password" name="csenha" id="csenha" value="<?php if($x==1) {
                    echo $csenha;
                    }
                    ?>">
                <br>
                <div class="text-center">
                    <input name="gravar" type="submit" id="gravar" value="Cadastre-se">
                </div>
            </form>
            <p id="demo"></p>
            <script>
                var y = <?php echo json_encode($x, JSON_HEX_TAG); ?>; 
                if(y==1){
                    document.forms["logar"].submit();
                }   
            </script>
        </div>
    </div>
    
    <script>  /* Script da música */
        /*const myTimeout = setTimeout(playF, 5000);  /* Caso queira tirar a música automatica, comente essa linha */
        var playBtn = document.getElementById("playBtn")  /* Declarando variáveis dos controles do áudio */
        var stopBtn = document.getElementById("stopBtn")
        var volumeBtn = document.getElementById("volumeBtn")
        var plusBtn = document.getElementById("plusBtn")
        var minusBtn = document.getElementById("minusBtn")
        var nextBtn = document.getElementById("nextBtn")
        var previousBtn = document.getElementById("previousBtn")

        let volumeM = 0.05;

        var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: 'violet',
            progressColor: 'purple',  /* Arrumar cor */
            barWidth: 4,
            height: 50,
            resposive: true,
            hideScrollbar: true,
            barRadius: 4,
        });  /* declarando função wavesurfer */

        playBtn.onclick = function() { /* função PLAY/PAUSE */
            playF();
        }
        function playF() {
                wavesurfer.playPause();
            if(playBtn.src.includes("img/musicas/play.png")) {
                playBtn.src = "img/musicas/pause.png";
            } else {
                playBtn.src = "img/musicas/play.png";
            }
        }
        stopBtn.onclick = function() {  /* função STOP */
            wavesurfer.stop();
            playBtn.src = "img/musicas/play.png";
        }
        volumeBtn.onclick = function() {  /* função MUTAR */
            wavesurfer.toggleMute();
            if(volumeBtn.src.includes("volume.png")) {
                volumeBtn.src = "img/musicas/mute.png";
            } else {
                volumeBtn.src = "img/musicas/volume.png";
            }
        }
        wavesurfer.setVolume(volumeM);
        minusBtn.onclick = function() {  /* função AUMENTAR */
            if(volumeM > 0.005) {
                volumeM -= 0.01;
            } else {
                alert('Volume mínimo!');
            }
            wavesurfer.setVolume(volumeM);
            document.getElementById("progresso").value = volumeM;
        }
        plusBtn.onclick = function() {  /* função DIMINUIR */
            if(volumeM < 0.095) {
                volumeM += 0.01;
                if (volumeM > 0.095) {
                    volumeM = 0.1;
                }
            } else {
                alert('Volume máximo!');
            }
            document.getElementById("progresso").value = volumeM;
            wavesurfer.setVolume(volumeM);
        }
        wavesurfer.on('finish', function () {  /* função termina a música */
            playBtn.src = "img/musicas/play.png"
            nextF();
            const myTimeout = setTimeout(playF, 3000);
        });


        /*  Playlist */

        let proximamusica = 0;
        let firstmusica = 0;
        let imgMus;

        if (firstmusica == 0) {
                wavesurfer.load('media/Hyper-SpoilerCyberpunk2077.mp3');
            }

        var matrizPlaylist = ['Cyberpunk 2077 - Theme music', 'Maelstrom Combat Theme', 'Max Brhon - Cyberpunk', 'Militech Combat Theme', 'NCPD Combat Theme', 'The Rebel Path', 'Valentinos Combat Theme'];  /* Nome das músicas */

        nextBtn.onclick = function() {
            nextF();
        }
        function nextF() {    /* função next */
            playBtn.src = "img/musicas/play.png";

            if (proximamusica == 6) {
                proximamusica = 0;
                firstmusica += 1;
            } else {
                proximamusica += 1;
            }
            document.getElementById('nomemusica').innerHTML = ''+ matrizPlaylist[proximamusica] + ' (' + (proximamusica+1) + '/7)';

            playlist_musica()
        }
        previousBtn.onclick = function() {    /* função previous */
            playBtn.src = "img/musicas/play.png";

            if (proximamusica == 0) {
                proximamusica = 6;
                firstmusica += 1;
            } else {
                proximamusica -= 1;
            }
            document.getElementById('nomemusica').innerHTML = ''+ matrizPlaylist[proximamusica]  + ' (' + (proximamusica+1) + '/7)';

            playlist_musica()
        }

        function playlist_musica() {  /* Locais das músicas */
            if (proximamusica == 0) {
                wavesurfer.load('media/Hyper-SpoilerCyberpunk2077.mp3');
                imgMus = 'img/musicas/fotomusica.jfif';
            } else if (proximamusica == 1) {
                wavesurfer.load('media/Maelstrom Combat Theme.mp3');
                imgMus = 'img/musicas/img1.png';
            } else if (proximamusica == 2){
                wavesurfer.load('media/Max Brhon - Cyberpunk.mp3');
                imgMus = 'img/musicas/img7.jfif';
            } else if (proximamusica == 3){
                wavesurfer.load('media/Militech Combat Theme.mp3');
                imgMus = 'img/musicas/img2.webp';
            } else if (proximamusica == 4){
                wavesurfer.load('media/NCPD Combat Theme.mp3');
                imgMus = 'img/musicas/img3.webp';
            } else if (proximamusica == 5){
                wavesurfer.load('media/The Rebel Path.mp3');
                imgMus = 'img/musicas/img4.jfif';
            } else if (proximamusica == 6){
                wavesurfer.load('media/Valentinos Combat Theme.mp3');
                imgMus = 'img/musicas/img5.jpg';
            }  
            document.getElementById("imgMusica").src = imgMus; 
        }  /* Se adicionar música, mude o parâmetro proximamusica nas funçoes previous e next */
    </script>
</body>
</html>
