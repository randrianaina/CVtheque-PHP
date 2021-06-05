<?php
// Récupération de mon tableau
//print_r ($_POST);
//$file = fopen('hrdata.csv', 'r'); /* print_r($csv);*/
//while (!feof($file) ) { // boucle pour lire tout le tableau = !feof=jusqu'à la fin du fichier

//$csv[] = fgetcsv($file, 1024, ";"); 
//}
//fclose($file); //fermer le fichier 
?>

<?php

if ($_POST) { //si $POST non vide , Utile lorsque les données sont vides
    // Lecture du fichier CSV en mode W.
    $monfichier = array();
    if ($monfichier = fopen('hrdata.csv', 'r')) {

        $row = 1; // Variable pour numéroter les lignes
        $newcontenu = '';
        // Variable contenant la nouvelle ligne :
        /*$nouvelle_ligne = $_POST['nom'] . ' ' . $_POST['prenom'] . '    ' . $_POST['age'] . '  ' . $_POST['date de naissance'] . ' ' . $_POST['code postal'] . ' '. $_POST['ville'] . "\r\n";*/

        print_r($monfichier);

        // Lecture du fichier ligne par ligne :
        while (($ligne = fgets($monfichier)) !== FALSE) {
            $newcontenu = $newcontenu . $ligne;
            $row++;
        }

        fclose($monfichier);
        // UPDATE : 27_02_2021 : ajout de PHP_EOL pour le saut de ligne du tableau CSV
        $nouvelle_ligne = PHP_EOL . $row . ';' .  $_POST["nom"] . ';' . $_POST["prenom"] . ';' . $_POST["age"] . '; ' . $_POST["datenaissance"] . ' ; ' . $_POST["adress1"] . ' ; ' . $_POST["adress2"] . ' ; ' . $_POST["cp"] . ' ; ' . $_POST["ville"] . ' ; ' . $_POST["telportable"] . ' ; ' . $_POST["telfixe"] . ' ; ' . $_POST["email"] . ' ; ' . $_POST["profil"] . ';' . $_POST['comp'] . ' ; ' . $_POST["website"] . ' ; ' . $_POST["linkedin"] . ' ; ' . $_POST["viadeo"] . ' ; ' . $_POST["facebook"];

        //';'.$_POST['comp1'].';'.$_POST['comp2'].';'.$_POST['comp3'].';'.$_POST['comp4'].';'.$_POST['comp5'].';'.$_POST['comp6'].';'.$_POST['comp7'].';'.$_POST['comp8'].';'.$_POST['comp9'].';'.$_POST['comp10'].

        $newcontenu = $newcontenu . $nouvelle_ligne; //rajout d'une nouvelle ligne 

        $fichierecriture = fopen('hrdata.csv', 'w'); //ouverture en écriture du fichier
        fputs($fichierecriture, $newcontenu); //écriture de l'ensemble + ajout nouvelle ligne
        fclose($fichierecriture);
        /* 
        var_dump($row); */
        /*  var_dump($newcontenu);  */
        /* print_r($newcontenu); */
    }
}
/* print PHP_EOL;
var_dump($_POST['datenaissance']); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un candidat</title>

    <!-- CSS  -->
    <link rel="stylesheet" href="css/formulaires.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&family=Original+Surfer&family=Zen+Dots&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>

</head>

<body>
    <section id='container'>
        <h1>CVTHEQUE</h1>
        <button id="retour"><a href="index.php" target="_parent"><i class="fas fa-arrow-circle-left fa-3x"></i></a></button>

        <h2>Fiche d'information</h2>
        <form method="POST" id='formulaire'>
            <main id="colonnes" >
                <section id="coordonnees" >
                    <div class="colonne1" >

                        <label for="nom">Nom</label>
                        <input class="name" type="text" required name="nom" placeholder="Nom" value="">

                        <label for="prenom">Prénom</label>
                        <input class="name" type="text" name="prenom" placeholder="Prénom" required value="">

                        <label for="age">Date de naissance</label>
                        <div id="age">
                            <input class="birthDate" type="text" name="datenaissance" placeholder="Date de naissance" required value="">
                            <input class="age" autocomplete="off" name="age" type="text" placeholder="Age" value="">
                        </div>

                        <label for="telportable">Télephone portable</label>
                        <input class="TelPort" name="telportable" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}" required value="">

                        <label for="telfixe">Télephone fixe</label>
                        <input class="telFix" name="telfixe" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}" value="">

                        <label for="email">Email</label>
                        <input class="email" name="email" type='email' placeholder='Email' value="" required>
                    </div>

                    <div class="colonne2" >
                        <label for="adresse1">Adresse</label>
                        <input class="adresse" type="text" name="adress1" placeholder="Adresse ligne 1" value="">

                        <label for="adresse2">Complément d'adresse</label>
                        <input class="adresse" type="text" name="adress2" placeholder="Adresse ligne 2" value="">

                        <label for="Ville">Ville</label>
                        <input class="adresse" type="text" name="ville" placeholder="Ville" value="">

                        <label for="CodePostal">Code Postal</label>
                        <input class="adresse" type="text" name="cp" pattern="[0-9]{5}" type="text" placeholder="ex : 86000" value="">

                        <label for="profil">Profil recherché:</label>
                        <input class="profile" type="text" name="profil" type="text" placeholder="Profil" value="">

                        <label for="Site web">Website</label>
                        <input class="profile" type="text" name="website" placeholder="Votre site web" value="">
                    </div>
                </section>

                <hr class="hr">

                <section id="profile">
                    <div class="colonne1" >
                        <label for="Linkedin">Profil Linkedin</label>
                        <input class="social" type='text' name="linkedin" placeholder='Profil Linkedin' value="">
                        <label for="Viadeo">Profil Viadeo</label>
                        <input class="social" type='text' name="viadeo" placeholder='Profil Viadeo' value="">
                    </div>
                    <div class="colonne2">
                        <label for="facebook">Profil Facebook</label>
                        <input class="social" type='text' name="facebook" placeholder='Profil Facebook' value="">
                    </div>
                </section>

                <hr class="hr">

                <footer id="CV">
                    <div class="competences">
                        <h2>Compétences</h2>
                        <p for="comp">Veuillez saisir 10 compétences séparées par un ";" (minimum 5 compétences / maximum 10 compétences).</p> 
                        <p for="comp">Ne pas rajouter de ";" après la dernière compétence !!!!</p>

                        <input type="text" id="widget" name="comp" placeholder=" ' Saisir vos compétences séparées par un ; ' " value="">
                    </div>

                    <div id="sendCV">
                        <h2>Votre CV</h2>
                        <div class="sendCV">
                            <label for="file">Veuillez insérer votre CV</label>
                            <div><input id="choiceFile" type="file" name="filename" value=""></div>
                        </div>
                    </div>

                    <div id="sendForm">
                        <input id="submit" type="submit" value="Envoyer le formulaire">
                    </div>
                </footer>

            </main>
        </form>
    </section>
</body>

</html>