<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/relatorio.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--JS-->
    <script src="js/r-contaUpdt.js"></script>
    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <?php
    require "g-Verify.php";
    require "conexao.php";
        
    $vlConta = $_POST['g-conta'];
    
    $calculadoraFake = "";
    if ($vlConta == 0){
        $calculadoraFake = "Contador de Dia: 0";
    }
    else if ($vlConta == 1){
        $calculadoraFake = "Contador de Dia: 1";
    }
    else if ($vlConta == 2){
        $calculadoraFake = "Contador de Dia: 2";
    }
    else if ($vlConta == 3){
        $calculadoraFake = "Contador de Dia: 3";
    }
    ?>
    <!-- CABEÇALHO -->
    <div class="header">
        <form action="relatorio.php" method="post">
            <input type="text" name="g-logged" value="sim" hidden>
            <button style="background-color:transparent;border:none;"> <img src="css/media/voltar.png" id="back" alt="Voltar"></button>
        </form>
        <div>
            <h1>Contador de Dias</h1>
            <span>Estatisticas</span>
        </div>
        <img src="css/media/empty.png" id="back">
    </div>

    <p>Escolha uma quantidade de dias para ver suas Estatisticas</p>
    <form action="r-contaDia.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-conta" id="g-conta" value="0" hidden>
        <select id="SelectD" class="ImputBox2 validate" required>
            <?php
                echo '<option value="" selected disabled hidden>'.$calculadoraFake.'</option>';
            ?>
            <option value="0">Contador de Dia: 0</option>
            <option value="1">Contador de Dia: 1</option>
            <option value="2">Contador de Dia: 2</option>
            <option value="3">Contador de Dia: 3</option>
        </select>
        <button type="submit" class="Btn2">Atualizar</button>
    </form>
    
    <div id="vgs-box">
        <h2>Quantidade de Alunos com essa contagem</h2>
    </div>
    <div id="Bloco1">
        <div id="RedBox2">
            <div id="cv-info">
                <div id="c-info">
                    <img src="css/media/evenro2.png" id="c-icon">
                    <h4>Alunos</h4>
                    <?php
                        $sql2 = "SELECT count('cpf_pessoa') as counted
                        from tb_pessoa
                        where id_pessoa = 'ALU'
                        and dia_pessoa = ".$vlConta.";"; // verifica todos os eventos relacionado ao curso
                        $result2 = $conn->query($sql2);

                        while($row2 = $result2->fetch_assoc()) { // todos os resultados demonstrados do curso
                            echo '
                            <h4>'.($row2['counted']).'</h4>
                            ';
                        }
                    ?>
                </div>

            </div>
            <div id="c-est2">
                <?php
                    $color = "rgba(255,255,255,1)";

                    $sql3 = "SELECT nm_pessoa, curso_pessoa
                    FROM tb_pessoa
                    WHERE id_pessoa = 'ALU'
                    and dia_pessoa = ".$vlConta."
                    ORDER BY nm_pessoa ASC;"; // verifica todos os eventos relacionado ao curso
                    $result3 = $conn->query($sql3);
                    while($row3 = $result3->fetch_assoc()) { // todos os resultados demonstrados do curso
                        if (substr($row3['curso_pessoa'], 0, 3) == "Adm"){
                            $color = "rgba(255,20,20,0.625)";
                        }
                        elseif (substr($row3['curso_pessoa'], 0, 3) == "Edi"){
                            $color = "rgba(100,100,255,0.625)";
                        }
                        elseif (substr($row3['curso_pessoa'], 0, 3) == "Enf"){
                            $color = "rgba(255,75,75,0.625)";
                        }
                        elseif (substr($row3['curso_pessoa'], 0, 3) == "Inf"){
                            $color = "rgba(0,0,255,0.625)";
                        }
                        elseif (substr($row3['curso_pessoa'], 0, 3) == "Tur"){
                            $color = "rgba(255,255,0,0.625)";
                        }
                        echo '
                        <h2 style="text-shadow:'.$color.' 1.5px 0.5px;">'.$row3['nm_pessoa'].' ('.substr($row3['curso_pessoa'], 0, 3).')</h2>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
    <div id="Bloco2">
        <div id="RedBox2">
            <div id="cv-info">
                <div id="c-info">
                    <img src="css/media/badge.png" id="c-icon">
                    <h4>Visitantes</h4>
                    <?php
                        $sql2 = "SELECT count('cpf_pessoa') as counted
                        FROM tb_pessoa
                        WHERE id_pessoa = 'CON'
                        and dia_pessoa = ".$vlConta.";"; // verifica todos os eventos relacionado ao curso
                        $result2 = $conn->query($sql2);

                        while($row2 = $result2->fetch_assoc()) { // todos os resultados demonstrados do curso
                            echo '
                            <h4>'.($row2['counted']).'</h4>
                            ';
                        }
                    ?>
                </div>
            </div>

            <div id="c-est2">
                <?php
                    $sql3 = "SELECT nm_pessoa
                    FROM tb_pessoa
                    WHERE id_pessoa = 'CON'
                    and dia_pessoa = ".$vlConta."
                    ORDER BY nm_pessoa ASC;"; // verifica todos os eventos relacionado ao curso
                    $result3 = $conn->query($sql3);
                    while($row3 = $result3->fetch_assoc()) { // todos os resultados demonstrados do curso
                        echo '
                        <h2>'.$row3['nm_pessoa'].'</h2>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <h6>Site desenvolvido por
            <br><a href="https://github.com/niButera">Nicolas Butera</a> e <a href="https://github.com/yukio-sato">Yukio
                Sato</a>
        </h6>
    </div>
</body>