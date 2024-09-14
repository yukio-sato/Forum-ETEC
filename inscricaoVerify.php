<!DOCTYPE html>
<html lang="pt-br">
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
    <div class="header">
        <a href="index.html"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="75%">
        <img src="css/media/empty.png" id="back">
    </div>

<?php
    // parte necessária: tenha certeza que a pasta onde está o PHPMailer seja nomeada -> "src"
    require "conexao.php";
    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');

    // cadastro info
    $nome = $_POST['nm'];
    $userEmail = $_POST['email'];
    $userCPF = $_POST['cpf'];
    $identificador = $_POST['selectPC'];
    $curso = "Curso";
    $diaEmail = $_POST['selectDia']; // para Convidados
    $dia = explode(",",$diaEmail); // para Convidados
    if ($identificador == "ALU"){
        $curso = $_POST['selectCurso'];
    }

    // email part
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true); //linha de teste
    
    /*
    Para criar uma senha codificada é necessário ter a verificação de duas etapas ativado
    Após isso você deve acessar https://myaccount.google.com/apppasswords?
    Coloque qualquer nome e guarde o código
    */

    try {

        $test = "info=$nome|$userEmail|$userCPF|$identificador|$curso|$diaEmail"; // preenchimento nas informações do QR Code
        $userInfo = "https://forumetecab.com.br/qrcodeEmail.php?$test"; // link em si do QR Code

        $qrMachine = "https://api.qrserver.com/v1/create-qr-code/?data=$userInfo&size=35%x35%"; // utilizando o API do QR Code
        
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // server para demonstrar erro do email em si em TESTES
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'forumtecinter@gmail.com'; // email responsavel por enviar
        $mail->Password = 'ztlb eecy tbef xpyk'; // senha codificada
        // forumtecinter@gmail.com
        // ztlb eecy tbef xpyk

        $mail->Port = '587';
    
        $mail->setFrom('forumtecinter@gmail.com'); // repita o valor da linha $mail->Username
        $mail->addAddress($userEmail); // email redirecionado (utiliza-se do email cadastrado)
    
        $mail->isHTML(true);
        $mail->Subject = 'Link para QR Code'; // titulo do email
        $mail->Body = '
            <div class="container">
                <div style="width:100%;text-align: center;">
                    <h3 style="text-align: center;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.13);font-family: "Poppins";font-size: 16px;">Olá '.ucfirst($nome).'! Sua inscrição foi concluida com sucesso <br>
                        Aqui esta o link para acessar seu Codigo QR caso queira mostrar ou baixar
                    </h3>
                    <br>
                    <img id="qr" src="'.$qrMachine.'">
                    <br>
                    <br>
                    <a href="https://forumetecab.com.br/qrcode.php?nome='.$nome.'&email='.$userEmail.'&cpf='.$userCPF.'&enter='.$identificador.'&curso='.$curso.'&dia='.$diaEmail.'">
                    <button style="width: 50%;margin-left: 25%;margin-right: 25%;background: linear-gradient(to right,rgba(211, 73, 73, 1), rgba(145, 17, 16, 1));box-shadow: 0px 0px 8px rgba(0, 0, 0, 0,178);border-radius: 50px;padding: 10px 30px;margin-bottom: 20px;font-size: 15px;cursor: pointer;color: white;border: 0px;">Clique aqui para baixar seu Codigo QR</button>
                    </a>
                </div>
            </div>
            <div style="width:100%;text-align: center;">
                <p style="text-align: center;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.13); font-size: 16px;">Site desenvolvido pelos alunos
                    <br><a href="https://github.com/niButera" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.13); color:rgba(145, 17, 16, 1); text-decoration: none; font-weight: bold; font-size: 16px;">Nicolas</a> e <a href="https://github.com/yukio-sato" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.13); color:rgba(145, 17, 16, 1); text-decoration: none; font-weight: bold; font-size: 16px;">Yukio</a>
                </p>
            </div>
        '; // 
        
        $mail->AltBody = 'Chegou mensagem'; // texto para cegos?
    
        if ($mail->send()) { // mensagem quando o email é enviado com sucesso (demonstra-se esta mensagem no site)
            echo '
                <div class="content">
                <!-- INFORMAÇÕES -->
                <br>
                <br>
                <div id="center">
                    <img src="css/media/emailyes.png" width="100px">
                    <p>E-Mail enviado com sucesso!</p>
                    <a onclick="window.location.reload()">Reenviar E-Mail</a>
                </div>
            ';
        }else { // mensagem quando não consegue enviar o email
            echo '
                <script>window.location.href="erro.html";</script>
            ';
        }
    } catch (Exception $e) {
        //echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
    
    // parte que cadastra o usuário no banco de dados

    $multiSql = "";
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
                while($row2 = $resultChecker2->fetch_assoc()) { // verifica a contagem de cadastros realizados neste evento
                    while($row3 = $resultChecker3->fetch_assoc()) { // verifica o limite do evento
                        if ($row2['contagem'] < $row3['nr_limite']){ // real comparação entre os dois
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
    elseif ($dia[0] != ""){
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
                    while($row2 = $resultChecker2->fetch_assoc()) { // verifica a contagem de cadastros realizados neste evento
                        while($row3 = $resultChecker3->fetch_assoc()) { // verifica o limite do evento
                            if ($row2['contagem'] < $row3['nr_limite']){ // real comparação entre os dois
                                if ($multiSql != ""){
                                    $multiSql .= ",(null,'".$userCPF."',".$row["cd_evento"].")";
                                }
                                else{
                                    $multiSql = "INSERT INTO tb_cadastrado VALUES (null,'".$userCPF."',".$row["cd_evento"].")";
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

    <div class="footer" style="margin-top: 25%;">
        <h5>Site desenvolvido pelos alunos
        <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
        </h5>
    </div>
</body>
</html>