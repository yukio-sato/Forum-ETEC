<?php
// -- Utilizado em banco da dados azure (online) --
// $servername = "forumetec.mysql.database.azure.com"; // Link do Azure
// $username = "forumetec"; // Nome do Usuario do MYSQLI
// $password = "f0rum3t3cab!"; // Senha (Normalmente: f0rum3t3cab!)

// -- Utilizado em banco da dados local (da máquina) --
$servername = "localhost"; // host do mysql utilizado para teste
$username = "root"; // username do mysql utilizado para teste
$password = "root"; // password do mysql utilizado para teste

$dbname = "forume33_db_cadastro"; // Nome do Database

// conexao do banco de dados em si
$conn2 = new mysqli($servername, $username, $password);

// normalmente checa a conexao, mas a maioria das vezes nem funciona, mas só por garantia eu coloquei esses comandos
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// conexao da Database
$conn = new mysqli($servername, $username, $password, $dbname);
?>