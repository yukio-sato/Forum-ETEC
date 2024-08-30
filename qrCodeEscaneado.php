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

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <div class="header">
        <img src="css/media/empty.png" id="back">
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="75%">
        <img src="css/media/empty.png" id="back">
    </div>

    <div class="content">
        <!-- INFORMAÇÕES -->
        <br>
        <br>
        <h1>QR Code Escaneado</h1>
        <?php
            require "conexao.php";

            $userCPF = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userCPF = $_POST['cpf'];
            } else{
                $userCPF = $_GET['cpf'];
            }

            $sqlChecker = "SELECT * FROM tb_pessoa WHERE cpf_pessoa = '".$userCPF."';";
            $resultCheck = $conn->query($sqlChecker);

            $sqlChecker2 = "SELECT * FROM tb_evento as e, tb_cadastrado as c WHERE (e.cd_evento = c.fk_cd_evento and c.fk_cpf_pessoa = '".$userCPF."');";
            $resultCheck2 = $conn->query($sqlChecker2);

                if ($resultCheck->num_rows > 0){
                    while($row2 = $resultCheck2->fetch_assoc()) {
                        echo '
                        <p>Curso: '.$row2["nm_evento"].' ('.$row2['dt_evento'].')</p>
                        ';
                    }
                    while($row = $resultCheck->fetch_assoc()) {
                        echo '
                        <hr>
                        <p>Nome: '.$row["nm_pessoa"].'</p>
                        <p>Email: '.$row["email_pessoa"].'</p>
                        <p>CPF: '.$row["cpf_pessoa"].'</p>
                        <p>Entrou como: '.$row["id_pessoa"].'</p>
                        <p>Contador de Dia (Atual): '.$row["dia_pessoa"].'</p>
                        <hr>
                        <br>
                        <a href="atualizaDia.php?cpf='.$userCPF.'" style="background-color:red;color:white;border: solid 1px red;border-radius: 10px;box-shadow: red 0px 0px 2px 10px;">Contar Dia</a>
                        ';
                    }
                }

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