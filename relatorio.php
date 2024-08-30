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
    <div class="header">
        <a onclick="history.back();"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <h1>Relatório</h1>
        <img src="css/media/empty.png" id="back">
    </div>


    <img src="css/media/insights.png" width="50px">
    <p>Escolha um dia e veja suas estatisticas</p>

    <!-- BOTÃO -->
    <form action="r-seg.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Segunda-Feira (09/09)</button>
    </form>
    <form action="r-ter.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Terça-Feira (10/09)</button>
    </form>
    <form action="r-qua.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Quarta-Feira (11/09)</button>
    </form>
    <form action="r-qui.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <button id="Rlt" class="Btn2">Quinta-Feira (12/09)</button>
    </form>

    <div class="footer">
        <p>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 -
            1º Semestre - 2024
        </p>
    </div>
</body>
</html>