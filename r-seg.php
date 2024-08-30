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

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <div class="header">
        <a onclick="history.back();"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <div>
            <h1>Segunda-Feira</h1>
            <span>Estatisticas</span>
        </div>
        <img src="css/media/empty.png" id="back">
    </div>
    <?php
        require "g-Verify.php";
        require "conexao.php";

        $dia = '2024-09-09'; // Substitua para o dia do evento YYYY-MM-DD
        $cursos = array( // Escreva o nome correto (dos cursos)
            'Administração',
            'Edificações',
            'Enfermagem',
            'Informática',
            'Turismo'
        );

        $sqlLimit = "SELECT e.nr_limite as limite
        FROM tb_evento as e,
        tb_cadastrado as c
        WHERE c.fk_cd_evento = e.cd_evento
        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
        $resultLimit = $conn->query($sqlLimit);

        $sql = "SELECT count('e.cd_evento') as counted
        FROM tb_evento as e,
        tb_cadastrado as c
        WHERE c.fk_cd_evento = e.cd_evento
        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
        $result = $conn->query($sql);
        while($row6 = $resultLimit->fetch_assoc()) { // todos os resultados demonstrados do curso
            while($row = $result->fetch_assoc()) { // todos os resultados demonstrados do curso
                echo '
                    <div id="vgs-box">
                        <span>Quadra</span>
                        <h3>'.($row6['limite']-$row['counted']).'</h3>
                        <h2>Vagas Restantes</h2>
                    </div>
                ';
            }
        }


        ?>
        <div id="RedBox2">
            <div id="cv-info">
                <div id="c-info">
                <img src="css/media/evenro2.png" id="c-icon">
                <h4>Curso</h4>
                </div>
                <div id="c-info">
                    <img src="css/media/badge.png" id="c-icon">
                    <h4>Vagas Cadastradas</h4>
                </div>
            </div>

        <?php
        for ($i=0; $i < count($cursos); $i++) { 
            $sql2 = "SELECT count('e.cd_evento') as counted
            FROM tb_evento as e,
            tb_cadastrado as c,
            tb_pessoa as p
            WHERE c.fk_cd_evento = e.cd_evento
            and e.nm_evento = '".$cursos[$i]."'
            and p.cpf_pessoa = c.fk_cpf_pessoa
            and p.id_pessoa = 'ALU'
            and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
            $result2 = $conn->query($sql2);

            while($row2 = $result2->fetch_assoc()) { // todos os resultados demonstrados do curso
            echo '
                <div id="c-est">
                    <h2>'.$cursos[$i].'</h2> '.($row2['counted']).'
                </div>
                ';
            }
        }

        $sql3 = "SELECT count('e.cd_evento') as counted
        FROM tb_evento as e,
        tb_cadastrado as c,
        tb_pessoa as p
        WHERE c.fk_cd_evento = e.cd_evento
        and p.cpf_pessoa = c.fk_cpf_pessoa
        and p.id_pessoa = 'CON'
        and e.dt_evento = '".$dia."';"; // verifica todos os eventos relacionado ao curso
        $result3 = $conn->query($sql3);

        while($row3 = $result3->fetch_assoc()) { // todos os resultados demonstrados do curso
        echo '
            <div id="c-est">
                <h2>Convidados</h2> '.($row3['counted']).'
            </div>
            ';
        }
    ?>
    </div>
    
    <div class="footer">
        <p>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 -
            1º Semestre - 2024
        </p>
    </div>
    <script>
        setTimeout(function(){
            window.location.reload();
        },2500);
    </script>
</body>
</html>