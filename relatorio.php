<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/relatorio.css">

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
    <!-- CABEÇALHO -->

    <form action="gestao.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <div class="header">
            <button style="background-color:transparent;border:none;"> <img src="css/media/voltar.png" id="back" alt="Voltar"></button>
            <h1>Relatório</h1>
            <img src="css/media/empty.png" id="back">
        </div>
    </form>

    <img src="css/media/insights.png" width="50px">
    <p>Escolha uma categoria e veja suas estatisticas</p>

    <!-- BOTÃO -->
    <form action="r-geral.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="GRL" class="Btn2">Geral</button>
    </form>
    <form action="r-contaDia.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-conta" value="0" hidden>
        <button id="GRL" class="Btn2">Contador de Dias</button>
    </form>
    <form action="r-adm.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" value="2024-09-09" hidden>
        <button id="ADM" class="Btn2">Administração</button>
    </form>
    <form action="r-edi.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" value="2024-09-09" hidden>
        <button id="EDI" class="Btn2">Edificações</button>
    </form>
    <form action="r-enf.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" value="2024-09-09" hidden>
        <button id="ENF" class="Btn2">Enfermagem</button>
    </form>
    <form action="r-inf.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" value="2024-09-09" hidden>
        <button id="INF" class="Btn2">Informática</button>
    </form>
    <form action="r-tur.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" value="2024-09-09" hidden>
        <button id="TUR" class="Btn2">Turismo</button>
    </form>

    <div class="footer">
        <h6>Site desenvolvido por
            <br><a href="https://github.com/niButera">Nicolas Butera</a> e <a href="https://github.com/yukio-sato">Yukio Sato</a>
        </h6>
    </div>
</body>