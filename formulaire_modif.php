<?php 
include_once('fonctions.php');

//Pour que les input du form prennent les valeurs de la ligne sélectionnée à partir de l'accueil
$id = $_POST['idCarte'];


//Update 02/03/2021 : division du tableau $results et comparaison de la valeur du Post["IdCarte] avec $resultsLigne[0] contenant l'ID de chaque candidats
foreach ($results as $resultsLigne) {
    if($resultsLigne[0]==$id) {
        $colonne = $resultsLigne;
    }
}

// Update 10/03/2021
    // Si bouton ENVOYER LE FORMULAIRE 
if (isset($_POST['submitModif'])){//si $POST non vide , Utile lorsque les données sont vides
    
    $monfichier=array();
    // Lecture du fichier CSV 
        if ($monfichier = fopen('hrdata.csv', 'r'))
        {
            $row = 0; // Variable pour numéroter les lignes
            $newcontenu = '';
            
            //Variable des valeurs des input
            $nouvelle_ligne = '"' . $_POST["idLigne"]. '"' .';'.  $_POST["nom"] . ';' . $_POST["prenom"] . ';' . $_POST["age"] . '; ' . $_POST["datenaissance"] . ' ; ' . $_POST["adress1"] . ' ; ' . $_POST["adress2"] . ' ; ' . $_POST["cp"] . ' ; ' . $_POST["ville"] . ' ; ' . $_POST["telportable"] . ' ; ' . $_POST["telfixe"] . ' ; ' . $_POST["email"] . ' ; ' . $_POST["profil"] . ';' . $_POST['comp'] .' ; ' . $_POST["website"] . ' ; ' . $_POST["linkedin"] . ' ; ' . $_POST["viadeo"] . ' ; ' . $_POST["facebook"].PHP_EOL;
            
            // Lecture du fichier ligne par ligne :
            while (($ligne = fgets($monfichier)) !== FALSE)
            {
                //Comparaison de la valeur de $row avec l'id de la ligne du candidat
                    //Si valeur de $row = à l'id de la ligne du candidat
                if ($row == $_POST['idLigne'])
                {
                    $newcontenu = $newcontenu . $nouvelle_ligne;
                    echo 'true';
                }
                else{
                
                $newcontenu = $newcontenu . $ligne;
                echo 'false';
            }
                $row++;    
                
            }
            
            /* print_r($newcontenu); */
            fclose($monfichier); 
            $fichierecriture = fopen('hrdata.csv', 'w');//ouverture en écriture du fichier
            fputs($fichierecriture, $newcontenu);//écriture de l'ensemble + ajout nouvelle ligne
            fclose($fichierecriture);

            
        }
    header('Location: index.php');       
}

?>
       
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formulaire.css">
    <title>CVTHEQUE Accueil Back-Office</title>
</head>
    <h1><center> CVTHEQUE </center></h1>
<body>
    <form action='' method="POST"> <!--ajout POST-->
        <div id="contenu">
            <h2>Fiche d'information</h2>
            <div id="colonnes">
                <div id="colonne1" >
                    <label for="nom">Nom</label>
                    <!-- INDEX DE LA LIGNE -->
                    <input style='display: none'  class="widget" type="text" name="idLigne"  value="<?php echo (null($colonne[0]))?>">
                    <!--Update PHP : 02/03/2021 : affichage des données du tableau dans les inputs du formulaire -->
                    <input class="widget" type="text"required name="nom" placeholder="Nom"  value="<?php echo (null($colonne[1]))?>">
                    <br>
                    <label for="prenom">Prénom</label>
                    <input class="widget" type="text" name="prenom" placeholder="Prénom" required   value="<?php echo(null($colonne[2]))?>">
                    <label for="age">Date de naissance</label>
                    <div id="age">
                    <input class="special1" type="text" name="datenaissance" placeholder="Date de naissance" required  value="<?php echo(null($colonne[4]))?>">
                    <br>
                    <input class="special2" autocomplete="off" name="age" type="text" placeholder="âge" value="<?php echo (null(age($colonne[4])))?>">
                    <br>
                    </div>
                    
                    <label for="telportable">Télephone portable</label>
                    <input class="widget"  name="telportable" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}"required value="<?php echo(null($colonne[9]))?>">
                    <br>
                    <label for="telfixe">Télephone fixe</label>
                    <input class="widget"  name="telfixe" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}" value="<?php echo(null($colonne[10]))?>">
                    <br>
                    <label for="email">Email</label>
                    <input class="widget"  name="email" type='email' placeholder='Email' value="<?php echo(null(($colonne[11])))?>" required>
                    

                </div>
        

                <div id="colonne2" >
                    
                    <label for="Adresse">Adresse</label>
                    <input class="widget" type="text" name="adress1" placeholder="Adresse ligne 1" value="<?php echo(null($colonne[5]))?>">
                    
                
                    <input class="widget" type="text" name="adress2" placeholder="Adresse ligne 2" value="<?php echo(null($colonne[6]))?>">
                    <br>
                    <label for="Ville">Ville</label>
                    <input class="widget" type="text" name="ville" placeholder="Ville" value="<?php echo(null($colonne[8]))?>" >
                    <br>
                    <label for="CodePostal">Code Postal</label>
                    <input class="widget" type="text" name="cp" pattern="[0-9]{5}" type="text"  placeholder="ex : 86000" value="<?php echo(null($colonne[7]))?>">
                    <br>
                    
                    

                    <!--
                        <label for="profil">Profil recherché:</label>
                            <select class="widget" type='text' nom="profil" placeholder='Profil Recherché' required>
                                <option value="">professeur</option>
                                <option value="">pdg</option>
                                <option value="">boss</option>
                                <option value="">empereur</option>
                                <option value="">roi</option>
                            </select>
                    -->

                    <label for="profil">Profil recherché:</label>
                    <input class="widget" type="text" name="profil"  type="text"  placeholder="profil" value="<?php echo(null($colonne[12])) ?>">
                    <br>



                    <label for="Site web">Website</label>
                    <input class="widget" type="text" name="website" placeholder="votre site web" value="<?php echo(null($colonne[23])) ?>" >
                    <br>
                    
                    
                </div>
                
            </div>
            <hr>
            <footer>
                <div id="colonne1" >
                <label for="Linkedin">Profil Linkedin</label>
                <input class="widget2" type='text' name="linkedin" placeholder='Profil Linkedin' value="<?php echo(null($colonne[24])) ?>">
                <label for="Viadeo">Profil Viadeo</label>
                <input class="widget2" type='text' name="viadeo" placeholder='Profil Viadeo' value="<?php echo(null($colonne[25])) ?>">
            </div>
            <div id="colonne2" style="width: 50% ">
                <label for="facebook">Profil Facebook</label>
                <input class="widget2" type='text' name="facebook" placeholder='Profil Facebook' value="<?php echo(null($colonne[26])) ?>">
            </div>
            </footer>
        </div>
        <div id="contenu">
            <h2 style="display: flex; justify-content: center;">Compétences</h2>
            <label class="special3" for="compétences">Veuillez saisir chacunes de vos compétences séparées par un ";" (minimum 5 compétences/maximum 10 compétences) Ne pas rajouter de ";" après la dernière compétence !!!!</label>
            <br>
            <!-- PROBLEME: UNE SEULE COMPETENCES ARRIVE DANS LE POST, le reste d'inputs pas-->
            <!-- Je mets toute les comps dans un seul INPUT -->
            <input type="text" class="widget" name="comp" placeholder="Veuillez saisir chacunes de vos compétences séparées par un ; (minimum 5 compétences/maximum 10 compétences)" style="width:80%; height: 100px; margin-left: auto; margin-right: auto;display: block;margin-top: 20px;" value="<?php for($i=13; $i < 23; $i++) {echo(null($colonne[$i]. ';')); } ?>" >


        </div>
        <div id="contenu">
            <h2 style="display: flex; justify-content: center;">Votre CV</h2>
            <label for="file">Veuillez insérer votre CV</label>
            <input class="widget4" type="file" id="myFile" name="filename" value="<?php //echo($colonne[]) ?>">
            <br>
            <input class="widget4" type="submit" style='width:30%;' value="Envoyer ">
        </div>
        <footer>
            <div id="findepage" style="display: flex; justify-content: space-around; margin-top: 100px; margin-bottom: 100px;">
                    <input name="submitModif" class="widget5" type="submit" value="Envoyer le formulaire" >
            </div>
        </footer>
        
        
        
        
    </form>
    


</body>
</html>
