<?php
    // require part - tenha certeza que a pasta seja nomeada -> "src" e esteja com o PHPMailer 
    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');

    // your info
    $userNM = $_POST['nm'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $identifier = $_POST['selectPC'];
    session_start();
    $_SESSION["userNM"] = $userNM;
    $_SESSION["email"] = $email;
    $_SESSION["cpf"] = $cpf;
    $_SESSION["identifier"] = $identifier;

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
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'forumtecinter@gmail.com'; // email responsavel por enviar
        $mail->Password = 'ztlb eecy tbef xpyk'; // senha codificada
        // forumtecinter@gmail.com
        // ztlb eecy tbef xpyk
        // yukioutiyamasato@gmail.com
        // kxpc wvxn krzl ntfa
        // jose.carlos.s.barbosa@gmail.com
        // pmva ospv bknx ooal
        $mail->Port = '587';
    
        $mail->setFrom('forumtecinter@gmail.com'); // repita o valor da linha $mail->Username
        $mail->addAddress($email); // email redirecionado
    
        $mail->isHTML(true);
        $mail->Subject = 'Teste de Envio de Email'; // titulo do email
        $mail->Body = '
        <h1>Olá <strong>'.$userNM.'<strong>!</h1>
        <hr>
        <a href="http://localhost/Forum-ETEC/qrcode.php">Link Teste</a>
        '; // descrição
        $mail->AltBody = 'Chegou mensagem'; // texto para cegos?
    
        if ($mail->send()) {
            //echo "Email Enviado com sucesso!";
        }else {
            //echo "Email não enviado!";
        }
    } catch (Exception $e) {
        //echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
    
?>