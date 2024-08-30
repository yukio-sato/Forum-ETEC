<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/inscricao.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- JS -->
    <script src="js/qrcodeReader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.0.0/dist/jsQR.min.js"></script>
    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <?php
    require "g-Verify.php";
    ?>
    <div class="header">
        <a onclick="history.back();"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <h1>Leitor de QR Code</h1>
        <img src="css/media/empty.png" id="back">
    </div>


    <img src="css/media/cameraw.png" style="background-color: rgba(145, 17, 16, 1);border-radius:10px;" width="50px">
    <p>Aponte a câmera para QR Code</p>

    <hr style="width: 50%;">
    <video id="qr-video" width="100%" height="auto" autoplay></video>
    <canvas id="qr-canvas" style="display: none;"></canvas>
    <hr style="width: 50%;">
    <div class="footer">
        <h5>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 - 1º Semestre - 2024
        </h5>
    </div>
</body>


</html>