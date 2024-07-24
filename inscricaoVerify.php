<?php
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
    $to = "yukioutiyamasato@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
    "CC: somebodyelse@example.com";
    
    mail($to,$subject,$txt,$headers);

    // send you to another page
    header("location: qrcode.php");
?>