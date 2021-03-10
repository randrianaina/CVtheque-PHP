<?php 

if ($_POST){//si $POST non vide , Utile lorsque les données sont vides
// Lecture du fichier CSV en mode W.
$monfichier=array();
    if ($monfichier = fopen('hrdata.csv', 'r')) {
        $row = 1; // Variable pour numéroter les lignes
        $newcontenu = ''; // Variable contenant la nouvelle ligne :

        /*$nouvelle_ligne = $_POST['nom'] . ' ' . $_POST['prenom'] . '    ' . $_POST['age'] . '  ' . $_POST['date de naissance'] . ' ' . $_POST['code postal'] . ' '. $_POST['ville'] . "\r\n";*/



        // Lecture du fichier ligne par ligne :
        while (($ligne = fgets($monfichier)) !== FALSE) {
            if ($row == "id")   // Si le numéro de la ligne est égal au numéro de la ligne à modifier : 
            {
                $newcontenu = $newcontenu . $nouvelle_ligne;
            } else { // Sinon, on réécrit la ligne
                $newcontenu = $newcontenu . $ligne;
            }
            $row++;    
        }
        
        fclose($monfichier);
        //$nouvelle_ligne = $row.';'.  "MACHIN" . ' ; ' . "Bidule" . '  ;  ' . "NULL" . ' ; ' . "04/10/1980" . ' ; ' . "86240" . ' ;'. "Iteuil" . "\r\n";
        
        $nouvelle_ligne = 
        PHP_EOL
        //php constant
        . $row . ';'
        //'index'
        . $_POST["nom"] . ';' 
        . $_POST["prenom"] . ';' 
        . $_POST["age"] . ';' 
        . $_POST["datenaissance"] . ';' 
        . $_POST["adress1"] . ';' 
        . $_POST["adress2"] . ';' 
        . $_POST["cp"] . ';' 
        . $_POST["ville"] . ';' 
        . $_POST["telportable"] . ';' 
        . $_POST["telfixe"] . ';' 
        . $_POST["email"] . ';' 
        . $_POST["profil"] . ';' 
        . $_POST['compétences'] .';' 
        . $_POST["website"] . ';' 
        . $_POST["linkedin"] . ';' 
        . $_POST["viadeo"] . ';' 
        . $_POST["facebook"];

        //';'.$_POST['comp1'].';'.$_POST['comp2'].';'.$_POST['comp3'].';'.$_POST['comp4'].';'.$_POST['comp5'].';'.$_POST['comp6'].';'.$_POST['comp7'].';'.$_POST['comp8'].';'.$_POST['comp9'].';'.$_POST['comp10'].

        $newcontenu = $newcontenu . $nouvelle_ligne; //rajout d'une nouvelle ligne 

        
        $fichierecriture = fopen('hrdata.csv', 'w');//ouverture en écriture du fichier
        fputs($fichierecriture, $newcontenu);//écriture de l'ensemble + ajout nouvelle ligne
        fclose($fichierecriture);
    }   
}  


print_r($_POST);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&family=Yanone+Kaffeesatz:wght@300;700&display=swap" rel="stylesheet">

    <!-- OLD CSS -->
	<!-- <link rel="stylesheet" href="formulaire.css"> -->

    <!-- CSS NEW -->
    <link href='CSS/style.css' rel='stylesheet' type='text/css'>
    <title>CVTHEQUE Accueil Back-Office</title>
</head>

<body id='formulaire'>
    <h1><center> CVTHEQUE </center></h1> 
    <button id="retour"><a href="accueil.php" target="_parent"><i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
	<form method='post'>
        <div class="contenu">
            <h2>Fiche information</h2>
            <div id="colonnesfiche">
                <div id="colonne1fiche" >
                    <label for="nom">Nom</label>
                    <input class="widget" type="text" name="nom" placeholder="Nom"  value="">
                    <br>

                    <label for="prenom">Prénom</label>
                    <input class="widget" type="text" name="prenom" placeholder="Prénom"required   value="">
                    <br>

                    <label for="age">Date de naissance</label>
                    <!-- <div id="age">
                        <input class="special1" type="text" name="datenaissance" placeholder="Date de naissance" required  value="">
                        <br>

                        <input class="special2" autocomplete="off" name="age" type="text" placeholder="âge"/>
                        <br>
                    </div> -->
                    
                    <label for="telportable">Télephone portable</label>
                    <input class="widget" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}"required>
                    <br>
                    <label for="telfixe">Télephone fixe</label>
                    <input class="widget" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}">
                    <br>
                    <label for="email">Email</label>
                    <input class="widget" type='email' placeholder='Email' required>
                    

                </div>
        

                <div id="colonne2fiche" >
                    
                    <label for="Adresse">Adresse</label>
                    <input class="widget" type="text" name="adress1" placeholder="Adresse ligne 1" >
                    
                    <input class="widget" type="text" name="adress2" placeholder="Adresse ligne 2" >
                    <br>

                    <label for="Ville">Ville</label>
                    <input class="widget" type="text" name="ville" placeholder="Ville" >
                    <br>

                    <label for="CodePostal">Code Postal</label>
                    <input class="widget" type="text" name="cp" pattern="[0-9]{5}" type="text"  placeholder="ex : 86000" >
                    <br>
                    
                    <label for="profil">Profil recherché:</label>
                    <select class="widget" type='text' placeholder='Profil Recherché' required>
                        <option value="">--Veuillez sélectionner un profil recherché--</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
					</select>
                    
					<label for="Site web">Website</label>
                    <input class="widget" type="text" name="website" placeholder="votre site web" >
                    <br>
            
                </div>
                
            </div>
            <hr>
            <footer id="footerprofil">
                <div class="colonneprofil" >
					<label for="Linkedin">Profil Linkedin</label>
					<input class="widget2" type='text' placeholder='Profil Linkedin'>
				</div>
				<div class="colonneprofil" >
					<label for="Viadeo">Profil Viadeo</label>
						<input class="widget2" type='text' placeholder='Profil Viadeo'>
				</div>
				<div class="colonneprofil">
					<label for="facebook">Profil Facebook</label>
					<input class="widget2" type='text' placeholder='Profil Facebook'>
				</div>
			</footer>
		</div>
		
        <div class="contenu">
            <h2 style="display: flex; justify-content: center;">Compétences</h2>
            <label class="special3" for="compétences">Veuillez saisir chacunes de vos compétences séparées par un ";" (minimum 5 compétences/maximum 10 compétences)</label>
            <br>
            <input type="text" class="widget" name="compétences" placeholder="Veuillez saisir chacunes de vos compétences séparées par un ; (minimum 5 compétences/maximum 10 compétences)" required style="width:80%; height: 100px; margin-left: auto; margin-right: auto;display: block;margin-top: 20px;">

        </div>
        <div class="contenu">
            <h2 style="display: flex; justify-content: center;">Votre CV</h2>
            <label class="labeli" style="display: flex; justify-content: center;">Veuillez insérer votre CV</label>
            <input class="widget4" type="file" id="myFile" name="filename" required>
            <br>
          
        </div>
        <footer>
            <div id="findepage" style="display: flex; justify-content: space-around; margin-top: 100px; margin-bottom: 100px;">   
                    <input class="widget5 shadow" type="submit" value="Envoyer le formulaire">
            </div>
        </footer> 
    </form>
</body>
</html>