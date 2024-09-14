<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/qrcode.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    
    <!-- SCRIPT -->
     <script src="js/qrDownLoad.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <?php
        require "conexao.php";

        $info = $_GET['info'];
        $charRemoved = "|"; // character que vai remover ao ser lido por qrcode do email

        $nome = explode($charRemoved,$info)[0];              // primeiro valor 'nome'
        $userEmail = explode($charRemoved,$info)[1];         // segundo valor 'email'
        $userCPF = explode($charRemoved,$info)[2];           // terceiro valor 'cpf'
        $identificador = explode($charRemoved,$info)[3];     // quarto valor 'como ele entrou'
        $curso = explode($charRemoved,$info)[4];             // quinto valor 'Curso Escolhido'
        $dia = explode(",", explode($charRemoved,$info)[5]); // para Convidados
        // $site = explode($charRemoved,$info)[6];              // para Gestao

        $userInfo = "";
        $multiSql = "";
        $locatinHref = 'senha.php?cpf='.$userCPF.'';

        // if ($site = "Site"){
        //     $locatinHref = 'qrCodeEscaneado.php?cpf='.$userCPF.'&g-logged=GLOG';
        // }

        // script utilizado para mover a tela do usuário para outra página após 0.1 segundo
        echo "<script>
        var delayInMilliseconds = 100; //0.1 second
            setTimeout(function() {
                window.location.href = '".$locatinHref."';
            }, delayInMilliseconds);
        </script>";

        $sqlOptional = "";
        if ($identificador == "ALU"){
            $sql = "INSERT INTO tb_pessoa
            VALUES ('".$userCPF."','".$nome."','".$userEmail."','".$curso."','".$identificador."',0);"; // comando que cadastra o usuário no site
            
            $sqlChecker = "SELECT * FROM tb_pessoa WHERE cpf_pessoa = '".$userCPF."';"; // verificador se a pessoa já cadastrou ou não
            $resultCheck = $conn->query($sqlChecker);
            if ($resultCheck->num_rows <= 0){ // se não existir o login/cadastro
                mysqli_query($conn,$sql); // cadastra você no tb_pessoa
                $sqlChecker = "SELECT * FROM tb_evento;"; // verificador se a pessoa já cadastrou ou não

                $resultOptional = $conn->query($sqlChecker);
                while($row = $resultOptional->fetch_assoc()) { // 'todos' os dias selecionados demonstrados

                    $sqlChecker2 = "SELECT count(cd_cadastrado) as 'contagem' FROM tb_cadastrado Where fk_cd_evento = ".$row['cd_evento'].";";
                    $resultChecker2 = $conn->query($sqlChecker2);
                
                    $sqlChecker3 = "SELECT nr_limite FROM tb_evento Where cd_evento = ".$row['cd_evento'].";";
                    $resultChecker3 = $conn->query($sqlChecker3);
                    while($row2 = $resultChecker3->fetch_assoc()) { // verifica a contagem de cadastros realizados neste evento
                        while($row3 = $resultChecker2->fetch_assoc()) { // verifica o limite do evento
                            if ($row3['contagem'] < $row2['nr_limite']){ // real comparação entre os dois
                                if ($multiSql != ""){
                                    $multiSql .= ",(null,'$userCPF',".$row["cd_evento"].")";
                                }
                                else{
                                    $multiSql = "INSERT INTO tb_cadastrado VALUES (null,'$userCPF',".$row["cd_evento"].")";
                                }
                            }
                        }
                    }
                }
            }
            $multiSql .= ";";
            mysqli_query($conn,$multiSql); // cadastra você no evento se possivel
        }
        elseif ($dia[0] != "Dia"){

            $sql = "INSERT INTO tb_pessoa
            VALUES ('".$userCPF."','".$nome."','".$userEmail."','".$curso."','".$identificador."',0);"; // comando que cadastra o usuário no site
            
            $sqlChecker = "SELECT * FROM tb_pessoa WHERE cpf_pessoa = '".$userCPF."';"; // verificador se a pessoa já cadastrou ou não
            $resultCheck = $conn->query($sqlChecker);
            if ($resultCheck->num_rows <= 0){ // se não existir o login/cadastro
                mysqli_query($conn,$sql); // cadastra você no tb_pessoa
                $multiSql = "";
                for ($i=0; $i < count($dia); $i++) { // utilizado para cada dia selecionado
                    $sqlOptional = "SELECT * FROM tb_evento WHERE dt_evento = '".$dia[$i]."';"; // recebe todos os eventos que possuem o mesmo dia selecionado
                    $resultOptional = $conn->query($sqlOptional);
                    while($row = $resultOptional->fetch_assoc()) { // 'todos' os dias selecionados demonstrados
                    
                        $sqlChecker2 = "SELECT count(cd_cadastrado) as 'contagem' FROM tb_cadastrado Where fk_cd_evento = ".$row['cd_evento'].";";
                        $resultChecker2 = $conn->query($sqlChecker2);
                    
                        $sqlChecker3 = "SELECT nr_limite FROM tb_evento Where cd_evento = ".$row['cd_evento'].";";
                        $resultChecker3 = $conn->query($sqlChecker3);
                        while($row2 = $resultChecker3->fetch_assoc()) { // verifica a contagem de cadastros realizados neste evento
                            while($row3 = $resultChecker2->fetch_assoc()) { // verifica o limite do evento
                                if ($row3['contagem'] < $row2['nr_limite']){ // real comparação entre os dois
                                    if ($multiSql != ""){
                                        $multiSql .= ",(null,'$userCPF',".$row["cd_evento"].")";
                                    }
                                    else{
                                        $multiSql = "INSERT INTO tb_cadastrado VALUES (null,'$userCPF',".$row["cd_evento"].")";
                                    }
                                }
                            }
                        }
                    }

                }
                $multiSql .= ";";
                mysqli_query($conn,$multiSql); // cadastra você no evento se possivel
            }
        }
    ?>
</body>
</html>