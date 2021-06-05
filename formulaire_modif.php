<?php
include_once('fonctions.php');

//Pour que les input du form prennent les valeurs de la ligne sélectionnée à partir de l'accueil
$id = $_POST['idCarte'];


//Update 02/03/2021 : division du tableau $results et comparaison de la valeur du Post["IdCarte] avec $resultsLigne[0] contenant l'ID de chaque candidats
foreach ($results as $resultsLigne) {
    if ($resultsLigne[0] == $id) {
        $colonne = $resultsLigne;
    }
}

// Update 10/03/2021
// Si bouton ENVOYER LE FORMULAIRE 
if (isset($_POST['submitModif'])) { //si $POST non vide , Utile lorsque les données sont vides
    modif($_POST["idLigne"], $_POST["nom"], $_POST["prenom"], $_POST["age"], $_POST["datenaissance"], $_POST["adress1"], $_POST["adress2"], $_POST["cp"], $_POST["ville"], $_POST["telportable"], $_POST["telfixe"], $_POST["email"], $_POST["profil"], $_POST['comp'], $_POST["website"], $_POST["linkedin"], $_POST["viadeo"], $_POST["facebook"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Modification Candidat</title>

    <!-- CSS  -->
    <link rel="stylesheet" href="css/formulaires.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&family=Original+Surfer&family=Zen+Dots&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>
</head>
<body id='formulaire'>
    <section id='container'>
            <h1>CVTHEQUE</h1>
            <button id="retour"><a href="index.php" target="_parent"><i class="fas fa-arrow-circle-left fa-3x"></i></a></button>

        <h2>Fiche d'information</h2>
        <form method="POST" id='formulaire'>
            <main id="colonnes" >
                <section id="coordonnees" >
                    <div class="colonne1">
                        <!-- INDEX DE LA LIGNE -->
                        <input id="id" type="text" name="idLigne" value="<?php echo (null($colonne[0])) ?>">

                        <label for="nom">Nom</label>
                        <input type="text" required name="nom" placeholder="Nom" value="<?php echo (null($colonne[1])) ?>">

                        <label for="prenom">Prénom</label>
                        <input  type="text" name="prenom" placeholder="Prénom" required value="<?php echo (null($colonne[2])) ?>">

                        <label for="age">Date de naissance</label>
                        <div id="age">
                            <input class="birthDate" type="text" name="datenaissance" placeholder="Date de naissance" required value="<?php echo (null($colonne[4])) ?>">
                            <input  autocomplete="off" name="age" type="text" placeholder="âge" value="<?php echo (null(age($colonne[4]))) ?>">
                        </div>

                        <label for="telportable">Télephone portable</label>
                        <input name="telportable" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}" required value="<?php echo (null($colonne[9])) ?>">

                        <label for="telfixe">Télephone fixe</label>
                        <input class="widget" name="telfixe" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}" value="<?php echo (null($colonne[10])) ?>">

                        <label for="email">Email</label>
                        <input class="widget" name="email" type='email' placeholder='Email' value="<?php echo (null(($colonne[11]))) ?>" required>
                    </div>

                    <div class="colonne2" >
                        <label for="adresse1">Adresse</label>
                        <input class="widget" type="text" name="adress1" placeholder="Adresse ligne 1" value="<?php echo (null($colonne[5])) ?>">

                        <label for="adresse2">Complément d'adresse</label>
                        <input class="widget" type="text" name="adress2" placeholder="Adresse ligne 2" value="<?php echo (null($colonne[6])) ?>">

                        <label for="Ville">Ville</label>
                        <input class="widget" type="text" name="ville" placeholder="Ville" value="<?php echo (null($colonne[8])) ?>">

                        <label for="CodePostal">Code Postal</label>
                        <input class="widget" type="text" name="cp" pattern="[0-9]{5}" type="text" placeholder="ex : 86000" value="<?php echo (null($colonne[7])) ?>">


                        <label for="profil">Profil recherché:</label>
                        <input class="widget" type="text" name="profil" type="text" placeholder="profil" value="<?php echo (null($colonne[12])) ?>">

                        <label for="Site web">Website</label>
                        <input class="widget" type="text" name="website" placeholder="votre site web" value="<?php echo (null($colonne[14])) ?>">
                    </div>
                </section>
                    <hr class='hr'>

                <section id="profile">
                    <div class="colonne1" >
                        <label for="Linkedin">Profil Linkedin</label>
                        <input class="social" type='text' name="linkedin" placeholder='Profil Linkedin' value="<?php echo (null($colonne[24])) ?>">
                        <label for="Viadeo">Profil Viadeo</label>
                        <input class="social" type='text' name="viadeo" placeholder='Profil Viadeo' value="<?php echo (null($colonne[25])) ?>">
                    </div>
                    <div class="colonne2" >
                        <label for="facebook">Profil Facebook</label>
                        <input class="social" type='text' name="facebook" placeholder='Profil Facebook' value="<?php echo (null($colonne[26])) ?>">
                    </div>
                </section>

                    <hr class="hr">

                    <footer id="CV">
                        <div class='competences'>
                            <h2>Compétences</h2>
                            <p for="comp">Veuillez saisir 10 compétences séparées par un ";" (minimum 5 compétences / maximum 10 compétences).</p> 
                            <p for="comp">Ne pas rajouter de ";" après la dernière compétence !!!!</p>

                            <input id="widget" type="text" name="comp" value="
                        <?php for ($i = 13; $i < 14; $i++) {
                            echo (null($colonne[$i] . ';'));
                        } ?>
                        ">
                        </div>

                        <div id="sendCV">
                            <h2>Votre CV</h2>
                            <div class='sendCV'>
                                <label for="file">Veuillez insérer votre CV</label>
                                <div><input id="choiceFile" type="file" name="filename" value=""></div>
                            </div>
                        </div>

                        <div id="sendForm">
                            <input name="submitModif" id="submit" type="submit" value="Enregistrer les modifications">
                        </div>
                    </footer>
                </section>
            </main>
        </form>
    </section>
</body>

</html>