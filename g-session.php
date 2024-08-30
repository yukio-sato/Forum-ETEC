<?php
    session_start();
    $_SESSION['g-logged'] = "sim";
    header("location: gestao.php");
?>