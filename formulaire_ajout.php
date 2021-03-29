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
        // UPDATE : 27_02_2021 : ajout de PHP_EOL pour le saut de ligne 
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
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formulaire.css">
    <title>Ajouter un candidat</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- CSS NEW -->
    <link href='CSS/style.css' rel='stylesheet' type='text/css'>
</head>
<body id='formulaire'>
    <a href='index.php' class='m-5'>
        <h1>CVTHEQUE</h1>
    </a>
    <h2 class='mb-5'>Fiche d'information</h2>
    <form method="POST" class='container'>
        <div id="colonnesfiche" class='row'>
            <div id="colonne1" class='col-12 col-lg-6'>
                <!-- INDEX DE LA LIGNE -->
                <input style='display: none' class="widget" type="text" name="idLigne" value="">

                <label for="nom">Nom</label>
                <!--Update PHP : 02/03/2021 : affichage des données du tableau dans les inputs du formulaire -->
                <input class="widget" type="text" required name="nom" placeholder="Nom" value="">

                <label for="prenom">Prénom</label>
                <input class="widget" type="text" name="prenom" placeholder="Prénom" required value="">

                <label for="age">Date de naissance</label>
                <div id="age">
                    <input class="special1" type="text" name="datenaissance" placeholder="Date de naissance" required value="">

                    <input class="special2" autocomplete="off" name="age" type="text" placeholder="âge" value="">

                </div>

                <label for="telportable">Télephone portable</label>
                <input class="widget" name="telportable" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}" required value="">

                <label for="telfixe">Télephone fixe</label>
                <input class="widget" name="telfixe" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}" value="">

                <label for="email">Email</label>
                <input class="widget" name="email" type='email' placeholder='Email' value="" required>


            </div>


            <div id="colonne2" class='col-12 col-lg-6'>

                <label for="adresse1">Adresse</label>
                <input class="widget" type="text" name="adress1" placeholder="Adresse ligne 1" value="">

                <label for="adresse2">Complément d'adresse</label>
                <input class="widget" type="text" name="adress2" placeholder="Adresse ligne 2" value="">

                <label for="Ville">Ville</label>
                <input class="widget" type="text" name="ville" placeholder="Ville" value="">

                <label for="CodePostal">Code Postal</label>
                <input class="widget" type="text" name="cp" pattern="[0-9]{5}" type="text" placeholder="ex : 86000" value="">


                <label for="profil">Profil recherché:</label>
                <input class="widget" type="text" name="profil" type="text" placeholder="profil" value="">




                <label for="Site web">Website</label>
                <input class="widget" type="text" name="website" placeholder="votre site web" value="">



            </div>


            <hr class='mx-auto'>

            <div idd="colonne1" class='col-12 col-lg-6'>
                <label for="Linkedin">Profil Linkedin</label>
                <input class="widget2" type='text' name="linkedin" placeholder='Profil Linkedin' value="">
                <label for="Viadeo">Profil Viadeo</label>
                <input class="widget2" type='text' name="viadeo" placeholder='Profil Viadeo' value="">
            </div>
            <div id="colonne2" class='col-12 col-lg-6'>
                <label for="facebook">Profil Facebook</label>
                <input class="widget2" type='text' name="facebook" placeholder='Profil Facebook' value="">
            </div>


            <hr class='mx-auto'>

            <div class='col-12'>
                <h2>Compétences</h2>
                <p class="special3" for="comp">Veuillez saisir 10 compétences séparées par un ";" (minimum 5 compétences/maximum 10 compétences) Ne pas rajouter de ";" après la dernière compétence !!!!</p>
                <!-- PROBLEME: UNE SEULE COMPETENCES ARRIVE DANS LE POST, le reste d'inputs pas-->
                <!-- UPDATE 10/3/21 Je mets toute les comps dans un seul INPUT -->
                <input type="text" class="widget" name="comp" placeholder="Veuillez saisir chacunes de vos compétences séparées par un ; (minimum 5 compétences/maximum 10 compétences)" value="">


            </div>
            <div class='col-12'>
                <div>
                    <h2>Votre CV</h2>
                    <div class='mx-auto w-25'>
                        <label for="file">Veuillez insérer votre CV</label>
                        <input class="widget4 mt-3" type="file" id="myFile" name="filename" value="">
                    </div>
                </div>
            </div>


            <input class="widget5 mx-auto mt-5 mb-5" type="submit" value="Envoyer le formulaire">



        </div>





    </form>



</body>

</html>