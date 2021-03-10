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

if ($_POST){//si $POST non vide , Utile lorsque les données sont vides
// Lecture du fichier CSV en mode W.
$monfichier=array();
    if ($monfichier = fopen('hrdata.csv', 'r'))
    {
        
        
        $row = 1; // Variable pour numéroter les lignes
        $newcontenu = '';
        // Variable contenant la nouvelle ligne :
        /*$nouvelle_ligne = $_POST['nom'] . ' ' . $_POST['prenom'] . '    ' . $_POST['age'] . '  ' . $_POST['date de naissance'] . ' ' . $_POST['code postal'] . ' '. $_POST['ville'] . "\r\n";*/

        print_r($monfichier);

        // Lecture du fichier ligne par ligne :
        while (($ligne = fgets($monfichier)) !== FALSE)
        {
           
            $newcontenu = $newcontenu . $ligne;
           
            $row++;    
            
        }
        
        
        fclose($monfichier);
        // UPDATE : 27_02_2021 : ajout de PHP_EOL pour le saut de ligne 
        $nouvelle_ligne = PHP_EOL.$row.';'.  $_POST["nom"] . ';' . $_POST["prenom"] . ';' . $_POST["age"] . '; ' . $_POST["datenaissance"] . ' ; ' . $_POST["adress1"] . ' ; ' . $_POST["adress2"] . ' ; ' . $_POST["cp"] . ' ; ' . $_POST["ville"] . ' ; ' . $_POST["telportable"] . ' ; ' . $_POST["telfixe"] . ' ; ' . $_POST["email"] . ' ; ' . $_POST["profil"] . ';' . $_POST['comp'] .' ; ' . $_POST["website"] . ' ; ' . $_POST["linkedin"] . ' ; ' . $_POST["viadeo"] . ' ; ' . $_POST["facebook"];

        //';'.$_POST['comp1'].';'.$_POST['comp2'].';'.$_POST['comp3'].';'.$_POST['comp4'].';'.$_POST['comp5'].';'.$_POST['comp6'].';'.$_POST['comp7'].';'.$_POST['comp8'].';'.$_POST['comp9'].';'.$_POST['comp10'].

        $newcontenu = $newcontenu . $nouvelle_ligne; //rajout d'une nouvelle ligne 

        
        $fichierecriture = fopen('hrdata.csv', 'w');//ouverture en écriture du fichier
        fputs($fichierecriture, $newcontenu);//écriture de l'ensemble + ajout nouvelle ligne
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
    <title>CVTHEQUE Accueil Back-Office</title>
</head>
    <h1><center> CVTHEQUE </center></h1>
<body>
    <form action=''method="POST"> <!--ajout POST-->
        <div id="contenu">
            <h2>Fiche d'information</h2>
            <div id="colonnes">
                <div id="colonne1" >
                    <label for="nom">Nom</label>
                    <input class="widget" type="text"required name="nom" placeholder="Nom"  value="">
                    <br>
                    <label for="prenom">Prénom</label>
                    <input class="widget" type="text" name="prenom" placeholder="Prénom" required   value="">
                    <label for="age">Date de naissance</label>
                    <div id="age">
                    <input class="special1" type="text" name="datenaissance" placeholder="Date de naissance" required  value="">
                    <br>
                    <input class="special2" autocomplete="off" name="age" type="text" placeholder="âge"/>
                    <br>
                    </div>
                    
                    <label for="telportable">Télephone portable</label>
                    <input class="widget"  name="telportable" type='tel' placeholder='ex:06XXXXXXXX' pattern="[0-9]{10}"required>
                    <br>
                    <label for="telfixe">Télephone fixe</label>
                    <input class="widget"  name="telfixe" type='tel' placeholder='ex:09XXXXXXXX' pattern="[0-9]{10}">
                    <br>
                    <label for="email">Email</label>
                    <input class="widget"  name="email" type='email' placeholder='Email' required>
                    

                </div>
        

                <div id="colonne2" >
                    
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
                    <input class="widget" type="text" name="profil"  type="text"  placeholder="profil" >
                    <br>



                    <label for="Site web">Website</label>
                    <input class="widget" type="text" name="website" placeholder="votre site web" >
                    <br>
                    
                    
                </div>
                
            </div>
            <hr>
            <footer>
                <div id="colonne1" >
                <label for="Linkedin">Profil Linkedin</label>
                <input class="widget2" type='text' name="linkedin" placeholder='Profil Linkedin' >
                <label for="Viadeo">Profil Viadeo</label>
                <input class="widget2" type='text' name="viadeo" placeholder='Profil Viadeo' >
            </div>
            <div id="colonne2" style="width: 50% ">
                <label for="facebook">Profil Facebook</label>
                <input class="widget2" type='text' name="facebook" placeholder='Profil Facebook'>
            </div>
            </footer>

        </div>
        <div id="contenu">
            <h2 style="display: flex; justify-content: center;">Compétences</h2>
            <label class="special3" for="compétences">Veuillez saisir chacunes de vos compétences séparées par un ";" (minimum 5 compétences/maximum 10 compétences) Ne pas rajouter de ";" après la dernière compétence !!!!</label>
            <br>
            <input type="text" class="widget" name="comp" placeholder="Veuillez saisir chacunes de vos compétences séparées par un ; (minimum 5 compétences/maximum 10 compétences)" style="width:80%; height: 100px; margin-left: auto; margin-right: auto;display: block;margin-top: 20px;">

        </div>
        <div id="contenu">
            <h2 style="display: flex; justify-content: center;">Votre CV</h2>
            <label for="file">Veuillez insérer votre CV</label>
            <input class="widget4" type="file" id="myFile" name="filename">
            <br>
            <input class="widget4" type="submit" style='width:30%;' value="Envoyer ">
        </div>
        <footer>
            <div id="findepage" style="display: flex; justify-content: space-around; margin-top: 100px; margin-bottom: 100px;">
                
                    <input class="widget5" type="submit" value="Envoyer le formulaire">
                    <input class="widget5" type="submit" value="  Annuler  ">
               

            </div>
        </footer>
        
        
        
        
    </form>
    


</body>
</html>