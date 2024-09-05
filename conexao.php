<?php
// $servername = "forumetec.mysql.database.azure.com"; // Link do Azure
// $username = "forumetec"; // Nome do Usuario do MYSQLI
// $password = "f0rum3t3cab!"; // Senha (Normalmente: f0rum3t3cab!)
$dbname = "forume33_db_cadastro"; // Nome do Database


$servername = "localhost"; // host do mysql utilizado para teste
$username = "root"; // username do mysql utilizado para teste
$password = "root"; // password do mysql utilizado para teste


// Create connection
$conn2 = new mysqli($servername, $username, $password);

// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$conn = new mysqli($servername, $username, $password, $dbname);
?>