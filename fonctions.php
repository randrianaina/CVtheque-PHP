<?php


    //OUVERTURE LECTURE DU FICHIER CSV - STOCKAGE DES DONNEES DANS UN NOUVEAU TABLEAU
    $file = fopen('hrdata.csv', 'r'); // Récupération de mon tableau

    $firstline=true; // Pour enlever la ligne d'entete;
        while (!feof($file) ) { // boucle pour lire tout le tableau = !feof=jusqu'à la fin du fichier
            $temp=fgetcsv($file, 1024, ";"); //On evite de lire la premiere ligne dans le tableau;

            if ($firstline==false) { //condition boléenne pour sauter le premier tour/ pour sauter la première ligne (en-tête)
                $csv[] = $temp; 
            }
            $firstline=false; 
        }

    fclose($file); //fermer le fichier 

    //MOTEUR RECHERCHE
    $results=array(); // Déclaration d'une table pour stocker les résultats de la recherche




    /* $data_cv = array();
        foreach($csv as $column) {
            if ($column!="NULL") {	
                $data_cv[]=$column;
            } else {
                $data_cv[]="";
            }
        }
        print_r($data_cv); */
    

    //fonction de nettoyage des accents pour une chaîne de caractères 
    function nettoyage_chaine($chaine) {     
        $tofind = array("à","á","â","ã","ä","å","ò","ó","ô","õ","ö","ø","è","é","ê","ë","ç","ì","í","î","ï","ù","ú","û","ü","ÿ","ñ","À","Á","Â","Ã","Ä","Å","Æ","Ç","È","É","Ê","Ë","Ì","Í","Î","Ï","Ð","Ñ","Ò","Ó","Ô","Õ","Ö","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß");
        // Lettres accentuées    

        $replac = array("a","a","a","a","a","a","o","o","o","o","o","o","e","e","e","e","c","i","i","i","i","u","u","u","u","y","n","A","A","A","A","A","A","A","C","E","E","E","E","I","I","I","I","D","N","O","O","O","O","O","O","U","U","U","U","Y","b","s"); 
        // Equivalent non accentué   

        return str_replace($tofind,$replac,$chaine); 
    }

        
        
    

            
    if ($_POST) {
         
        if (isset($_POST['saisie'])){
        /* Recherche parcourant toutes les lignes et colonnes du tableau $results avec strtoupper 
        — Renvoie une chaîne en majuscules et la fonction nettoyage_chaine() */
            for ($i=0; $i <= count($csv) - 1; $i++) {
                if (
                    strtoupper(nettoyage_chaine($csv[$i][1])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][2])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][8])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][3])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][3])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    /*Comp start here*/
                    ||strtoupper(nettoyage_chaine($csv[$i][13])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][14])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][15])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][16])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][17])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][18])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][19])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][20])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][21])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))
                    ||strtoupper(nettoyage_chaine($csv[$i][22])) == 
                        strtoupper(nettoyage_chaine($_POST['saisie']))) 
                {
                    //We move the data from on variable to another
                    $results[] = $csv[$i]; 
                    // remplissage du tableau $results en fonction des lignes recherchées ,plus specifique; $csv[$i] c'est une ligne qui va etre ajoute dans $result[]; []=rajouter au tableau; $dollar=$lala != $lala=$dollar;
                }
            } 
        } else {
            
            $results = $csv; //copie coller intégrale du tableau
        }

        
        //Pour integrer le TRI, on doit remplacer '$csv' avec '$results' qui est la variable utilisé dans le CARTES;
        //TRI NOM
        if(isset($_POST['Nom'])){ 
            for ($i=0; $i <= count($results) - 1; $i++) {
                $noms[] = $results[$i][1];
            }
                
            if ($_POST['Nom']=='Croissant') { //On a remplace 'asc' avec 'Croissant' pour relier au <select>;
                array_multisort($noms, SORT_ASC, $results);
                //print_r($noms);
                
            } elseif ($_POST['Nom']=='Décroissant') {
                array_multisort($noms, SORT_DESC, $results);
                //print_r($noms);
            }
        }
        
        // TRI VILLE
        if(isset($_POST['Ville'])){
            $ville=array ();
            for ($i=0;$i<=count($results)-1;$i++) {
                $ville[] = $results[$i][8];
            }
                
        
            if($_POST['Ville']=='Croissant'){
                //$selectville="--Veuillez sélectionner une option--";
                array_multisort($ville, SORT_ASC, $results);
                // print PHP_EOL;
                //print_r($ville);  
            }

            elseif ($_POST['Ville']=='Décroissant'){
                array_multisort($ville, SORT_DESC, $results);
                //print PHP_EOL;
                //print_r($ville);
            }
            }

            // TRI PROFIL 
            if(isset($_POST['Profil'])){
                $profil=array ();
                for ($i=0;$i<=count($results)-1;$i++) {
                    $profil[] = $results[$i][12];
                
                }
                if($_POST['Profil']=='Croissant'){
                    //$selectprofil="--Veuillez sélectionner une option--";
                    array_multisort($profil, SORT_ASC, $results);
                    //print PHP_EOL;
                    //print_r($profil);
                        
                }

                elseif ($_POST['Profil']=='Décroissant'){
                    array_multisort($profil, SORT_DESC, $results);
                    //print PHP_EOL;
                    //print_r($profil);
                }
            }

            //TRI AGE
            if(isset($_POST['Age'])){
                $age=array ();
                for ($i=0;$i<=count($results)-1;$i++) {
                //$age[] = $csv[$i][3];
                $age[] = age($results[$i][4]); //07/07/2020 :copie-coller depuis accueil.php ; $result remplacer par $age
            
                }
                if($_POST['Age']=='Croissant'){
                    //$selectprofil="--Veuillez sélectionner une option--";
                    array_multisort($age, SORT_ASC, $results);
                    //print PHP_EOL;
                //print_r($age);
                        
                }
        
                elseif ($_POST['Age']=='Décroissant'){
                    array_multisort($age, SORT_DESC, $results);
                    //print PHP_EOL;
                    //print_r($age);
                }
        
            }

        } else { //Pour afficher les cartes quand il y a pas de recherche
            $results=$csv;
        }
    

    //CALCUL AGE
    function age($date_naissance)	{

        /*extraction des jour, mois, an de la date (ici 24/06/2020 devient 24,06,2020)*/
            list($jour1, $mois1, $annee1) = explode ('/', $date_naissance); 
            
            //création des milisecondes par mktime et valeur timestamp contient les milisecondes 
                // UPDATE : 27_02_2021 > ajout intval pour convertir string en int 
            $timestampN = mktime (0,0,0,  intval($mois1), intval($jour1), intval($annee1));
            //timestampN = naissance;
            
            /*ci-dessous vérif valeur timestamp = 709336800 est donc = 24/06/1992*/
            //echo $timestampn;
            /* print PHP_EOL; */
            
            $today = date("j,m,Y");
            /*test date du jour*/
            //echo $today;
            list($jour2, $mois2, $annee2) = explode (',', $today);
            
            $timestampT = mktime (0,0,0,  $mois2, $jour2, $annee2);
            /*ci-dessous vérif valeur timestamp = 1593468000 est donc = 30/06/2020 attention maj date du jour*/
            //echo $timestampt;
            
            $timestampAGE=$timestampT-$timestampN;
            /*test timestamp age*/
            //print $timestampage;
            
            //31556926(secondes) est égal à 1 an
            $age=$timestampAGE/31556926;
            
            /*floor arrondi à l'entier inférieur*/
            return floor ($age);
        }

    //Update : 02/03/2021 : NULL qui ne fonctionne pas sur les COMPETENCES
    function null($i){
        if ($i === "NULL") {
            $i = "";
        } else {
            return $i;
        }
    }


    
        
        /* $resultsModifie = $results; */
       /*  $fichierecriture = fopen('hrdata.csv', 'w'); *///ouverture en écriture du fichier
        /* fputs($fichierecriture, $resultsModifie); */
        /* foreach ($resultsModifie as $newArray) {
            foreach ($newArray as $newLigne) {
            var_dump($newligne);
            fputcsv($fichierecriture, $newLigne, ";");//écriture de l'ensemble + ajout nouvelle ligne
            }
        }
        fclose($fichierecriture); */
        


 /*    } */


    


?> 