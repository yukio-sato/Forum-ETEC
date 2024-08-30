<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (count($_POST) <= 0){
            echo '<script>history.back();</script>';
        }
    }
    else{
        if ($_GET['g-logged'] != "GLOG"){
            echo '<script>history.back();</script>';
        } 
    }
?>