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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <?php
    require "g-Verify.php";
    ?>
    <!-- CABEÇALHO -->
    <div class="header">
        <a onclick="history.back();"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <h1>QR Code PDF</h1>
        <img src="css/media/empty.png" id="back">
    </div>

    <div class="content">
        <!-- INFORMAÇÕES -->
        <br>
        <br>
        <h1>PDF Sendo Gerado</h1>
        <script src="js/qrCodeGen.js"></script>
            <?php
                require "conexao.php";
                
                $sqlChecker = "SELECT * FROM tb_pessoa ORDER BY nm_pessoa ASC;"; // verificador se a pessoa já cadastrou ou não
                $resultCheck = $conn->query($sqlChecker);

                $first = false;
                $cursos = "";
                $iEtiqueta = 0;
                $pag = 1;
                $iCaseiro = 1;
                $iPrimo = 1; // não sendo primo!

                while($row = $resultCheck->fetch_assoc()) { // todos os resultados demonstrados do curso 
                    $sqlChecker2 = "SELECT * FROM tb_cadastrado WHERE fk_cpf_pessoa = '".$row['cpf_pessoa']."';"; // verificador se a pessoa já cadastrou ou não
                    $resultCheck2 = $conn->query($sqlChecker2);
                    echo "<br>";
                    print_r($cursos);
                    echo '<script>down(\''.$row['nm_pessoa'].'\',
                    \''.$row['id_pessoa'].'\',
                    \'https://localhost/Forum-ETEC/senha.php?cpf='.$row['cpf_pessoa'].'\',
                    \''.$iPrimo.'\',
                    \''.$iCaseiro.'\',
                    \''.$pag.'\'
                    )</script>';
                    if ($iPrimo == 3){
                        $iPrimo = 1;
                        $iCaseiro = $iCaseiro + 1;
                    }
                    else{
                        $iPrimo = $iPrimo + 1;
                    }
                    $iEtiqueta = $iEtiqueta + 1;
                    if ($iEtiqueta >= 33){
                        $iEtiqueta = 0;
                        $pag = $pag + 1;
                        $iPrimo = 1;
                        $iCaseiro = 1;
                    }
                }
                echo '<script>save();</script>';
            ?>
    </div>

    <div class="footer" style="margin-top: 25%;">
        <h5>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 - 1º Semestre - 2024
        </h5>
    </div>
</body>


</html>