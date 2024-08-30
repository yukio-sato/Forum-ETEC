<?php
    session_start();
    if (count($_SESSION) <= 0){
        echo '<script>history.back();</script>';
    }
?>