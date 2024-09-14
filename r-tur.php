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
    <script src="js/r-dataChanger.js"></script>
    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <?php
    require "g-Verify.php";
    require "conexao.php";
        
    $dia = $_POST['g-dia']; // dia selecionado
    $sgCurso = 'Tur';       // curso selecionado
    $cursos = array(        // Escreva o nome correto (dos cursos)
        'Administração',
        'Edificações',
        'Enfermagem',
        'Informática',
        'Turismo'
    );
    
    $diaSemana = "";
    if ($dia == "2024-09-09"){
        $diaSemana = "Segunda-Feira (09/09)";
    }
    else if ($dia == "2024-09-10"){
        $diaSemana = "Terça-Feira (10/09)";
    }
    else if ($dia == "2024-09-11"){
        $diaSemana = "Quarta-Feira (11/09)";
    }
    else if ($dia == "2024-09-12"){
        $diaSemana = "Quinta-Feira (12/09)";
    }
    ?>
    <!-- CABEÇALHO -->
    <div class="header">
        <form action="relatorio.php" method="post">
            <input type="text" name="g-logged" value="sim" hidden>
            <button style="background-color:transparent;border:none;"> <img src="css/media/voltar.png" id="back" alt="Voltar"></button>
        </form>
        <div>
            <h1>Turismo</h1>
            <span>Estatisticas</span>
        </div>
        <img src="css/media/empty.png" id="back">
    </div>

    <p>Escolha um dia para ver suas Estatisticas</p>
    <form action="r-tur.php" method="post">
        <input type="text" name="g-logged" value="sim" hidden>
        <input type="text" name="g-dia" id="g-dia" value="2024-09-09" hidden>
        <select id="SelectD" class="ImputBox2 validate" required>
            <?php
                echo '<option value="" selected disabled hidden>'.$diaSemana.'</option>';
            ?>
            <option value="2024-09-09">Segunda-Feira (09/09)</option>
            <option value="2024-09-10">Terça-Feira (10/09)</option>
            <option value="2024-09-11">Quarta-Feira (11/09)</option>
            <option value="2024-09-12">Quinta-Feira (12/09)</option>
        </select>
        <button type="submit" class="Btn2">Atualizar</button>
    </form>
    
    <?php
        $sql = "SELECT e.nr_limite as limite
        FROM tb_evento as e,
        tb_cadastrado as c
        WHERE c.fk_cd_evento = e.cd_evento
        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
        $result = $conn->query($sql);
        
        $sql1 = "SELECT count('e.cd_evento') as counted
        FROM tb_evento as e,
        tb_cadastrado as c
        WHERE c.fk_cd_evento = e.cd_evento
        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
        $result1 = $conn->query($sql1);

        while($row = $result->fetch_assoc()) { // todos os resultados demonstrados do curso
            while($row1 = $result1->fetch_assoc()) { // todos os resultados demonstrados do curso
                echo '
                    <div id="vgs-box">
                        <span>Quadra</span>
                        <h3>'.($row['limite']-$row1['counted']).'</h3>
                        <h2>Vagas Restantes</h2>
                    </div>
                ';
            }
        }
    ?>

    <div id="Bloco1">
        <div id="RedBox2">
            <div id="cv-info">
                <div id="c-info">
                    <img src="css/media/evenro2.png" id="c-icon">
                    <h4>Alunos</h4>
                    <?php
                        $sql2 = "SELECT count('e.cd_evento') as counted
                        FROM tb_evento as e,
                        tb_cadastrado as c,
                        tb_pessoa as p
                        WHERE c.fk_cd_evento = e.cd_evento
                        and p.cpf_pessoa = c.fk_cpf_pessoa
                        and p.id_pessoa = 'ALU'
                        and SUBSTRING(p.curso_pessoa, 1, 3) = '".$sgCurso."'
                        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
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
                    $sql3 = "SELECT p.nm_pessoa as nm_pessoa
                    FROM tb_pessoa as p,
                    tb_cadastrado as c,
                    tb_evento as e
                    WHERE c.fk_cd_evento = e.cd_evento
                    and p.cpf_pessoa = c.fk_cpf_pessoa
                    and p.id_pessoa = 'ALU'
                    and SUBSTRING(p.curso_pessoa, 1, 3) = '".$sgCurso."'
                    and e.dt_evento = '".$dia."'
                    ORDER BY p.nm_pessoa ASC;"; // verifica todos os eventos relacionado ao curso
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
    <div id="Bloco2">
        <div id="RedBox2">
            <div id="cv-info">
                <div id="c-info">
                    <img src="css/media/badge.png" id="c-icon">
                    <h4>Visitantes</h4>
                    <?php
                        $sql2 = "SELECT count('e.cd_evento') as counted
                        FROM tb_evento as e,
                        tb_cadastrado as c,
                        tb_pessoa as p
                        WHERE c.fk_cd_evento = e.cd_evento
                        and p.cpf_pessoa = c.fk_cpf_pessoa
                        and p.id_pessoa = 'CON'
                        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
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
                    $sql3 = "SELECT p.nm_pessoa as nm_pessoa
                    FROM tb_pessoa as p,
                    tb_cadastrado as c,
                    tb_evento as e
                    WHERE c.fk_cd_evento = e.cd_evento
                    and p.cpf_pessoa = c.fk_cpf_pessoa
                    and p.id_pessoa = 'CON'
                    and e.dt_evento = '".$dia."'
                    ORDER BY p.nm_pessoa ASC;"; // verifica todos os eventos relacionado ao curso
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