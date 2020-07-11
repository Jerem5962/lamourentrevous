<?php

$prenomElle = '';
$nomElle = '';
$prenomLui = '';
$nomLui = '';

$err = [
    'errPrenomElle' => '',
    'errNomElle' => '',
    'errPrenomLui' => '',
    'errNomLui' => '',
];

// ----- ENLEVER LES SLASCHES ET ESPACES ET METTRE CHAQUES CARACTERES EN MINUSCULE

function text_input($str) {
    $str = stripslashes($str);
    $str = trim($str);
    $str = strtolower($str);
    return $str;
}

// ----- VERIFICATION QUE LES CHAMPS SONT REMPLIS -----

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty($_POST['prenomElle'])) {
        $err['errPrenomElle'] = 'Tu dois indiquer un prénom';
    } else {
        $prenomElle = text_input($_POST['prenomElle']);
    }

    if (empty($_POST['nomElle'])) {
        $err['errNomElle'] = 'Tu dois indiquer un nom';
    } else {
        $nomElle = text_input($_POST['nomElle']);
    }

    if (empty($_POST['prenomLui'])) {
        $err['errPrenomLui'] = 'Tu dois indiquer un prénom';
    } else {
        $prenomLui = text_input($_POST['prenomLui']);
    }

    if (empty($_POST['nomLui'])) {
        $err['errNomLui'] = 'Tu dois indiquer un nom';
    } else {
        $nomLui = text_input($_POST['nomLui']);
    }

// ----- VERIFICATION AUCUNE ERREURS AVANT LE DEBUT DES CALCULS ------------

    if (empty($err['errPrenomElle']) && empty($err['errNomElle']) && empty($err['errPrenomLui']) && empty($err['errNomLui'])){

        $chaine = "$prenomLui$nomLui$prenomElle$nomElle";
        $nbrA = substr_count($chaine, "a");
        $nbrM = substr_count($chaine, "m");
        $nbrO = substr_count($chaine, "o");
        $nbrU = substr_count($chaine, "u");
        $nbrR = substr_count($chaine, "r");
        $chaine = $nbrA.$nbrM.$nbrO.$nbrU.$nbrR;

    //--------- ALGORITHME DE CALCUL ---------------------

        while (strlen($chaine) > 2){
            $chaine2 = "";
            $chaine3 = "";
            for ($i = 0; $i != (strlen($chaine) - 1); $i++) {
                $chaine2 = $chaine[$i] + $chaine[$i + 1];
                $chaine3 .= $chaine2;
                //--------- VERIFICATION BOUCLE INFINIE ---------------------
                if ($chaine3 == 999 || $chaine3 == 995 || $chaine3 == 5675){
                    $chaine3 = intval($chaine3);
                    $chaineInfinie = 'Votre amour est infini ! ! !';
                }
            }
            $chaine = $chaine3;
        }

    //--------- CALCUL DU NOMBRE DE VISITEURS ---------------------

        $fichier = "src/log.php";
        $handle = fopen($fichier, "r");
        $content = stream_get_contents($handle);
        fclose($handle);
        var_dump($content);
        $handle = fopen($fichier, "w");
        $content = intval($content) + 1;
        fwrite($handle, $content);
        fclose($handle);
    }
}



