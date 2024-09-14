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
    require "conexao.php";
        
    $cursos = array( // Escreva o nome correto (dos cursos)
        'Administração',
        'Edificações',
        'Enfermagem',
        'Informática',
        'Turismo',
        'Curso' // incluso pois é geral
    );
    ?>
    <!-- CABEÇALHO -->
    <div class="header">
        <form action="relatorio.php" method="post">
            <input type="text" name="g-logged" value="sim" hidden>
            <button style="background-color:transparent;border:none;"> <img src="css/media/voltar.png" id="back" alt="Voltar"></button>
        </form>
        <div>
            <h1>Inscrições</h1>
            <span>Estatisticas</span>
        </div>
        <img src="css/media/empty.png" id="back">
    </div>

    <div id="vgs-box">
        <span>Inscrições até agora</span>
        <?php
            $sql1 = "select count(cpf_pessoa) as 'counted' from tb_pessoa;";
            $result = $conn->query($sql1);
            while($row = $result->fetch_assoc()) { // todos os resultados demonstrados do curso
                echo '<h3>'.$row['counted'].'</h3>';
            }
        ?>
    </div>

    <div id="RedBox2">
        <div id="cv-info">
            <div id="c-info">
                <img src="css/media/evenro2.png" id="c-icon">
                <h4>Curso</h4>
            </div>
            <div id="c-info">
                <img src="css/media/badge.png" id="c-icon">
                <h4>Vagas</h4>
            </div>
        </div>
        <?php
        for ($i=0; $i < count($cursos); $i++) {
            $sql = "select count(cpf_pessoa) as 'counted' from tb_pessoa where SUBSTRING(curso_pessoa, 1, 3) = '".substr($cursos[$i], 0, 3)."';";
            $result2 = $conn->query($sql);
            while($row2 = $result2->fetch_assoc()) { // todos os resultados demonstrados do curso
                if ($cursos[$i] == "Curso"){
                echo '
                    <div id="c-est">
                        <h2>Convidados</h2> '.($row2['counted']).'
                    </div>
                ';  
                } else{
                echo '
                    <div id="c-est">
                        <h2>'.$cursos[$i].'</h2> '.($row2['counted']).'
                    </div>
                ';
                }
            }
        }
        ?>
    </div>

    <div class="footer">
        <h6>Site desenvolvido por
            <br><a href="https://github.com/niButera">Nicolas Butera</a> e <a href="https://github.com/yukio-sato">Yukio Sato</a>
        </h6>
    </div>
</body>