<?php
require 'src/data.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/asset/style.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <title>L'amour entre vous</title>
</head>
<body>
    <div class="nbrVisiteur">
        <p class="text_visiteur"><?php if (isset($content)){ echo "$content tests ont étaient effectués";} ?> </p>
    </div>
    <div class="container">
        <h1>L'amour entre vous</h1>
        <div class="contain">
            <form action="index.php" class="formulaire" method="post">
                <div class="Elle">
                    <h2>Elle</h2>
                    <label for="prenomElle">
                        Indique moi le prénom:
                    </label>
                    <input type="text" id="prenomElle" name="prenomElle" placeholder="entre le prénom">
                    <p class="err"><?= $err['errPrenomElle'] ?></p><br>
                    <label for="nomElle">
                        Indique moi le nom:
                    </label>
                    <input type="text" id="nomElle" name="nomElle" placeholder="entre le prénom">
                    <p class="err"><?= $err['errNomElle'] ?></p><br><br>
                </div>
                <div class="petitCoeur"></div>
                <div class="Lui">
                    <h2>Lui</h2>
                    <label for="prenomLui">
                        Indique moi le prénom:
                    </label>
                    <input type="text" id="prenomLui" name="prenomLui" placeholder="entre le prénom">
                    <p class="err"><?= $err['errPrenomLui'] ?></p><br>
                    <label for="nomLui">
                        Indique moi le nom:
                    </label>
                    <input type="text" id="nomLui" name="nomLui" placeholder="entre le prénom">
                    <p class="err"><?= $err['errNomLui'] ?></p><br><br>
                </div>
                <button type="submit" class="submit">Clik sur le coeur<br><img src="/asset/img/coeur.png" alt="" class="imgButton"></button>
            </form>
        </div>
        <div class="resultat">
            <?php if (isset($chaineInfinie)) {?>
            <h3><?= $chaineInfinie ?> </h3>
            <?php } else { ?>
            <h3>Votre pourcentage d'amour: </h3>
            <p class="pourcentage"><?php if (isset($chaine)){echo $chaine;}else {echo "0";} ?> %</p>
            <?php } ?>
        </div>
    </div>

</body>


</html>
