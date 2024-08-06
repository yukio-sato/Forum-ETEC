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
    <!-- CABEÇALHO -->
    <div class="header">
        <a href="index.html"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="760px">
        <img src="css/media/empty.png" id="back">
    </div>

    <div class="container">
        <!-- INFORMAÇÕES -->
        <p>Inscrição conluída, esse é seu Codigo QR de acesso ao evento <br>Tenha-o em mãos na portaria!</p>

        <div id="RedBox">
            <?php
                session_start();

                $servername = "forumetec.mysql.database.azure.com";
                $username = "forumetec";
                $password = "f0rum3t3cab!";
                $dbname = "cadastro";

                // Create connection
                
                if (!mysqli_ping(mysqli_connect($servername, $username, $password))) {
                    header("location: erro.html");
                    exit();
                }
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                $sql = "INSERT INTO pessoa
                VALUES (null,'".$_SESSION["cpf"]."','".$_SESSION["userNM"]."','".$_SESSION["email"]."','".$_SESSION["identifier"]."',0)";

                $sqlChecker = "SELECT * FROM pessoa WHERE cpf_pessoa = '".$_SESSION["cpf"]."';";
                $resultCheck = $conn->query($sqlChecker);
                if ($resultCheck->num_rows <= 0){
                    $result = $conn->query($sql);
                }
                
                $userInfo = "Nome: ".$_SESSION["userNM"]." | Email: ".$_SESSION["email"]." | CPF: ".$_SESSION["cpf"]." | Entrar como: ".$_SESSION["identifier"];
                echo '<img src="https://api.qrserver.com/v1/create-qr-code/?data='.$userInfo.'&size=100%x100%" id="code">';
            ?>
            <script>
                async function down(){
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF();
                                
                    /* other method to generate a qr code with jspdf api
                    const qrCodeCanvas = document.createElement('canvas');
                    await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
                    const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
                    */
                    <?php
                        echo "
                        pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=$userInfo&size=100x100`, 'PNG', 5, 5, 50, 50);
                        pdf.text(`Nome: ".$_SESSION["userNM"]."`, 60, 20); // text on pdf
                        "; // the qr code itself
                    ?>    
                                
                    pdf.save('qrcode.pdf'); // download in your device
                }
            </script>
            <button id="Dwld" class="Btn3" onclick="down()">Baixar QrCode</button>
        </div>
    </div>

    <div id="RedBox2">
        <div class="info-local">
            <img src="css/media/localw.png" id="local" alt="">
            <h5>ETEC Adolpho Berezin</h5>
        </div>
        <div class="info-local">
            <img src="css/media/place.png" id="local" alt="">
            <h5>Av. Monteiro Lobato, nº 8000<br>Bal. Jussara, Mongaguá</h5>
        </div>
    </div>
</div>

    <div class="footer">
        <p>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 -
            1º Semestre - 2024
        </p>
    </div>
</body>