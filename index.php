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

        <!--BOTÃO PERSONAGENS-->
        <a href="personagens.php" class="b_cont">
            <button type="button" class="btn btn-outline-light btn-lg"> Personagem </button> <br><br>
        </a>
        
        <!--BOTÃO CAMPANHAS-->
        <a href="campanhas.php" class="b_cont">
            <button type="button" class="btn btn-outline-light btn-lg"> Campanhas/Sessões </button> <br><br>
        </a>
        
        <!--BOTÃO SISTEMA-->
        <a href="sistema.php" class="b_cont">
            <button type="button" class="btn btn-outline-light btn-lg"> Sistema </button> <br><br>
        </a>

        <a href="url" class="b_cont"> teste link </a>
        
    </body>
</html>