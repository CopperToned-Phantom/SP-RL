<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Página Inicial</title>
    </head>

    <body>
        <!-- HEADER -->
        <?php include('templates/header.php'); ?>

        <br> <br>

        <aside class="aside-btn container-fluid">
        
            <!--BOTÃO PERSONAGENS-->
            <a href="personagens.php" class="b_cont" style="display : inline-block; margin-bottom: 0 !important;">
                <button type="button" class="btn btn-outline-light btn-lg btn-index"> Personagens </button> <br><br><br>
            </a>
            
            <!--BOTÃO CAMPANHAS-->
            <a href="campanhas.php" class="b_cont" style="display : inline-block" margin-bottom: 0 !important;>
                <button type="button" class="btn btn-outline-light btn-lg btn-index"> Campanhas / Sessões </button> <br><br><br>
            </a>
            
            <!--BOTÃO SISTEMA-->
            <a href="sistema.php" class="b_cont" style="display : inline-block" margin-bottom: 0 !important;>
                <button type="button" class="btn btn-outline-light btn-lg btn-index"> Sistema </button> <br><br><br>
            </a>

        </aside>

        <aside class="aside-image">
            <img src="media/LogoSPIRL.png" alt="SP/RL" class="img-fluid">
        </aside>
        
    </body>
</html>