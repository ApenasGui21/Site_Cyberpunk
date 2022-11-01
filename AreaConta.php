<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Area da Conta</title>
    <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="css/style_musicas.css">
    <script src="js/menus.js" defer></script>
    <script src="https://unpkg.com/wavesurfer.js"></script>
</head>
<body>
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
            <h2 class="titulo">Boas-vindas <?php echo $_POST["nome"]?> </h2>
            <p> Informações sobre sua conta:<br>&nbsp</p>
            <p> Seu nome: <?php echo $_POST["nome"]?><br>
                Seu nome de usuário: <?php echo $_POST["usuario"] ?><br>
                Seu e-mail: <?php echo $_POST["email"] ?><br>
            </p>
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
