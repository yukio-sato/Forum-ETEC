<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <?php
    require "g-Verify.php";
    ?>
    <h1> Gestão </h1>

    <!-- BOTÕES -->
    <form action="relatorio.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Relatório</button>
    </form>
    <form action="leitorQRCode.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Glr" class="Btn2">Ler QR Code</button>
    </form>
    <form action="qrCodeGen.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Gerar PDF dos Cadastrados</button>
    </form>
    <form action="qrCodeFakeGen.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Gerar PDF dos Personalizados</button>
    </form>
</body>

</html>