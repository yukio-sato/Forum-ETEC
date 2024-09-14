<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/galeria.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- JS -->
    <script src="js/controles.js"></script>

    <title>Galeria - Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <div class="header">
        <a onclick="history.back();"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <h1>Galeria</h1>
        <img src="css/media/empty.png" id="back">
    </div>
    <?php
    $qtPorLinha = 0; // quantidade de fotos em uma linha (atualmente 4)
    $exibidor = 0; // todas as fotos que não serão exibidas de maneira prévia
    $stopCustom = false; // uma condição utilizada para aquele que precisam somente colocar 3 imagens prévias

    $outros2022 = 'forum_fotos/2022/Outros'; // caminho desejado
    $adm2023 = 'forum_fotos/2023/ADM'; // caminho desejado
    $edi2023 = 'forum_fotos/2023/EDI'; // caminho desejado
    $enf2023 = 'forum_fotos/2023/ENF'; // caminho desejado
    $inf2023 = 'forum_fotos/2023/INF'; // caminho desejado
    $tur2023 = 'forum_fotos/2023/TUR'; // caminho desejado


    function imgHolder($caminho,$id){
        $qtPorLinha = 0;
        $exibidor = 0;
        $stopCustom = false;
        $files1 = scandir($caminho); // literalmente o dir em um cmd

        for ($i=0; $i < count($files1); $i++) { 
            if ($i > 1){ // maior que 1 para não pegar o "." e ".." do dir
                if (strtolower(substr($files1[$i],0,9)) == "principal"){ // se for a imagem principal
                    echo '<img src="'.$caminho.'/'.$files1[$i].'" id="principal">';
                }
            }
        }

        for ($i=0; $i < count($files1); $i++) { 
            if ($i > 1){ // maior que 1 para não pegar o "." e ".." do dir
                if (strtolower(substr($files1[$i],0,9)) != "principal"){ // se não for a imagem principal
                    if ($exibidor == 1){
                        echo '<div id="dentro'.$id.'">';
                        $exibidor++;
                    }
                    if($qtPorLinha == 0){ // começe a 
                        echo '<div id="secundarias">';
                    }
                    echo '<img src="'.$caminho.'/'.$files1[$i].'" class="scnd">';
                    $qtPorLinha++;
                    if ((count($files1)-3) > 4 && $stopCustom == false && $qtPorLinha == 3){
                        $stopCustom = true;
                        $qtPorLinha++;
                        echo '<img src="css/media/descer.png" class="btnshow" id="toggleImage'.$id.'">';
                    }
                    if ($qtPorLinha == 4){ // se chegar em 4 finalize a div
                        echo '</div>';
                        $qtPorLinha = 0;
                        $exibidor++;
                    }

                }
            }
        }
        for ($i=0; $i < (4-$qtPorLinha); $i++) { 
            echo '<div style="background-color: transparent;width: 23%;"></div>';
        }
        if ($qtPorLinha > 0){
            echo '</div>';
        }
        if ($exibidor > 0){
            echo '</div>';
        }
    }
    ?>
    <div class="content">
        <h2>2022</h2>
        <?php
            imgHolder($outros2022,"");
        ?>
        <div id="ADM">
            <h3>Administração - 26/09</h3>
            <?php
            imgHolder($adm2023,"");
            ?>
        </div>

        <div id="EDF">
            <h3>Edificações - 27/09</h3>
            <?php
            imgHolder($edi2023,"EDF");
            ?>
        </div>

        <div id="TRSM">
            <h3>Turismo - 28/09</h3>
            <?php
            imgHolder($tur2023,"TRSM");
            ?>
        </div>

        <div id="ENF">
            <h3>Enfermagem - 28/09</h3>
            <?php
            imgHolder($enf2023,"ENF");
            ?>
        </div>

        <div id="TI">
            <h3>Informática - 29/09</h3>
            <?php
            imgHolder($inf2023,"TI");
            ?>
        </div>

        <div id="imageModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modalImage">
            <div id="caption"></div>
            <a class="prev" id="prev">&#10094;</a>
            <a class="next" id="next">&#10095;</a>
        </div>
    </div>
    <div class="footer">
        <h5>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
        </h5>
    </div>

</body>
</html>