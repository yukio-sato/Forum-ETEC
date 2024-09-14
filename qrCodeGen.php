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
        <br>
        <br>
        <h1 id="txtDsgn">Gerando</h1>
        <script src="js/qrCodeGen.js"></script>
            <?php
                require "conexao.php";
                
                $sqlChecker = "SELECT nm_pessoa, id_pessoa, cpf_pessoa FROM tb_pessoa ORDER BY nm_pessoa ASC;"; // verificador se a pessoa já cadastrou ou não
                $resultCheck = $conn->query($sqlChecker);

                $iEtiqueta = 0; // numero da etiqueta até o momento em 1 página
                $pag = 1;       // página atual
                $iCaseiro = 1;  // (de caseiro tem nada!) normalmente utilizado como posição Y no script JS
                $iPrimo = 1;    // (não sendo primo!) normalmente utilizado como posição X no script JS

                while($row = $resultCheck->fetch_assoc()) { // todos os resultados demonstrados do curso 
                    $sqlChecker3 = "SELECT * FROM tb_imprimido WHERE fk_cpf_pessoa = '".$row['cpf_pessoa']."';"; // verificador se a pessoa já cadastrou ou não
                    $resultCheck3 = $conn->query($sqlChecker3);
                    if ($resultCheck3->num_rows <= 0){ // se não existir o login/cadastro
                        echo '<script>down(\''.$row['nm_pessoa'].'\',
                        \''.$row['id_pessoa'].'\',
                        \'https://forumetecab.com.br/senha.php?cpf='.$row['cpf_pessoa'].'\',
                        \''.$iPrimo.'\',
                        \''.$iCaseiro.'\',
                        \''.$pag.'\'
                        );
                        </script>';
                        if ($iPrimo == 3){ // o '3' significa a quantidade de colunas de etiquetas
                            $iPrimo = 1;
                            $iCaseiro = $iCaseiro + 1;
                        }
                        else{
                            $iPrimo = $iPrimo + 1;
                        }
                        $iEtiqueta = $iEtiqueta + 1;
                        if ($iEtiqueta >= 33){  // quantidade de etiquetas em 1 página
                            $iEtiqueta = 0;
                            $pag = $pag + 1;
                            $iPrimo = 1;
                            $iCaseiro = 1;
                        }
                    }
                }
                echo '
                <script>document.getElementById("txtDsgn").setAttribute("hidden","true")</script>
                <h1>Gerado!</h1>
                <br>
                <br>
                ';
            ?>
            <button class="btn" onclick="save()">Imprimir</button>
            <br>
            <br>
            <button class="btn" onclick="window.location.href='registraEtiqueta.php?&g-logged=GLOG'">Registrar Cadastros</button>
    </div>

    <div class="footer" style="margin-top: 25%;">
        <h5>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
        </h5>
    </div>
</body>


</html>