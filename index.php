<?php 
include_once('fonctions.php');

if (isset($_POST['submitDelete']))
{
   delete($_POST['idCarte']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>

    <!-- CSS OLD -->
    <!-- <link href='accueil.css' rel='stylesheet' type='text/css'> -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- CSS NEW -->
    <link href='CSS/style.css' rel='stylesheet' type='text/css'>
    


    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&family=Yanone+Kaffeesatz:wght@300;700&display=swap" rel="stylesheet">
     <title>Cvtheque</title>
</head>
   
<body id='accueil'>
    <a href='accueil.php' class='m-5'><h1>CVTHEQUE</h1></a>
    <nav class='container-fluid col-11 shadow'>
        <section class='row d-flex align-items-center'>

            <form method='POST' id="search" class='col-xl-3 col-lg-3 col-md-6 col-6'>
                <label for="recherche par nom" style='font-size:20px'>Recherche</label>
                <br>
                <input type="search" id="RchNom" name="saisie" placeholder='Saisir ici'>
                <button type='submit' class="search" id='submit' >Ok</button>
            </form>

            <p class="triName col-xl-1 col-lg-1 col-md-6 col-3 d-flex align-items-center g-0">Trier par:</p>

            <div id="triDeSearch" class=' col-xl-8 col-lg-8 col-12 row mt-xl-0 mt-lg-0 mt-2'>
                    <!--PAR NOM-->
                    <section class="categorieTri col-xl-3 col-lg-3 col-md-3 col-6">
                        <form method="post" action=''>
                            
                            <select name="Nom" class='tri'>
                                <option selected <?php if (isset($selectnom) && $selectnom=="") echo "selected";?>>NOM</option>
                                <option <?php if (isset($selectnom) && $selectnom=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectnom) && $selectnom=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <span><input type="submit" name="submit" value="Trier" /></span>
                        </form>
                    </section>
                    <!--PAR VILLE-->
                    <section class="categorieTri col-xl-3 col-lg-3 col-md-3 col-6 ">
                        <form method='post' >
                            <!-- <p class="triName"> Ville</p> -->
                            <select class='tri' name="Ville">
                                <option selected <?php if (isset($selectville) && $selectville=="") echo "selected";?>>VILLE</option>
                                <option <?php if (isset($selectville) && $selectville=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectville) && $selectville=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <span><input type="submit" name="submit" value="Trier" /></span>
                        </form>
                    </section>
                    <!--PAR PROFIL-->
                    <section class="categorieTri col-xl-3 col-lg-3 col-md-3 col-6 mt-xl-0 mt-lg-0 mt-md-0 mt-2">
                        <!-- <p class="triName">Profil</p> -->
                        <form method='post'>
                            <select name="Profil" class='tri'>
                                <option selected <?php if (isset($selectprofil) && $selectprofil=="") echo "selected";?>>PROFIL</option>
                                <option <?php if (isset($selectprofil) && $selectprofil=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectprofil) && $selectprofil=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <span><input type="submit" name="submit" value="Trier" /></span>
                        </form>
                    </section>
                    <!--PAR AGE-->
                    <section class="categorieTri col-xl-3 col-lg-3 col-md-3 col-6 mt-xl-0 mt-lg-0 mt-md-0 mt-2">
                        <form method='post'>
                        <!-- <p class="triName">Âge</p> -->
                            <select class='tri' name='Age'>
                                <option selected <?php if (isset($selectage) && $selectage=="") echo "selected";?>>AGE</option>
                                <option <?php if (isset($selectage) && $selectage=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectage) && $selectage=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <span><input type="submit" name="submit" value="Trier" /></span>
                        </form>
                    </section>
            </div>
        </section> 
    </nav>


    <section id='bodycontainer' class='container-fluid col-11'>
        <main>
            <?php for ($i=0; $i<count($results);$i++) { //Parcourir le .csv ?>  
                <section class='cartes shadow'>

                    <!-- AJOUT V du 06/07 + LIGNES CSS 234 à 292 -->
                    <section class='cardButtons'>
                        <form action="formulaire_modif.php" method="POST">
                            <?php echo '<input name="idCarte" value="' . $results[$i] [0] . '" style="display: none">'; ?>
                            <button type='submit' class='modifier'>
                            <i class="fas fa-pencil-alt fa-1x"></i>
                            </button>
                        </form>

                        <form action="index.php" method="POST">
                            <?php echo '<input name="idCarte" value="' . $results[$i] [0] . '" style="display: none">'; ?>
                            <button name='submitDelete' type="submit" class='supprimer'>
                                <i class="fas fa-trash-alt fa-1x"></i>
                            </button>
                            <!-- <input name='submitDelete' type="submit" value='poubelle'> -->
                        </form>
                    </section>
                    
                    <!-- JUSQUE LA -->        
                            <p class="Name" title="Nom">
                            <?php 
                            //NOM
                            print_r($results[$i] [1]);
                            print (" ");
                            //PRENOM
                            print_r($results[$i] [2]);
                            ?>
                            </p>
                            
                            
                            <!--PROFIL-->
                            <p class="profil mt-3 mb-4" title="Poste">
                            <?php
                            print_r($results[$i] [12]);
                            print (" ");
                            ?>
                            </p>
                            
                            <!--VILLE-->
                            <p class='ville'>
                            
                            <?php
                            print_r ($results[$i][8]);
                            print (" ");
                            ?>
                            </p>
                            
                            <!--<p>Age</p>-->
                            <p id="cachee mt-2" class='age' title="Age">
                            <?php
                            print_r (age($results[$i] [4]));
                            print (" ");
                            ?>
                             ans
                            </p>
                            <!--<p >Numero portable</p>-->
                            <p class='portable'>
                            <?php
                            if ($results[$i][9] != "NULL") {
                                print_r ($results[$i][9]);
                                print (" ");
                            }
                            ?>
                            </p>
                            
                            
                            <section class="contact mt-3">
                             
							 <?php if(file_exists("cv/".$i.".docx")){?> <!-- si(if) le fichier existe j'affiche le contenu de l'accolade -->
							   
							   <a id='CV' href="/Cvtheque/cv/<?php print $i;?>.docx" class="fas fa-file-pdf fa-1x" target='_blank' value="Open File" title="CV"></a>
								
								<!-- si il n'y a pas je passe sur le sinon si -->
								
								<?php } elseif (file_exists("cv/".$i.".pdf"))  { ?> 
                                    <!-- sinon si(elseif) le fichier existe j'affiche le contenu de l'accolade -->
								
								<a id='CV' href="/Cvtheque/cv/<?php print $i;?>.pdf" class="fas fa-file-pdf fa-1x" target='_blank' value="Open File" title="CV"></a> 
                              
								<!-- les conditions n'étant pas possible il n'y a aucun logo -->
								<?php } ?>
                                

                                <!-- UPDATE : 27_02_2021 : isset à la place de if pour ne rien afficher s'il y a rien dans l'index-->
								<?php if (isset($csv[$i][23])) { ?> 
								
								
                                <a id='website' href="<?php print_r ($csv[$i][23])?>" class="fab fa-safari fa-1x" target='_blank' title="Site Web"></a>
                               
                                <?php } ?>
                                
								<?php  if ($csv[$i][11]!="NULL"){?> <!-- si ligne 11 est différent de "NULL" alors j'affiche le contenu de ligne 11 -->


                                <a id='email' href="mailto:<?php print_r ($csv[$i][11])?>" class="fas fa-at fa-1x" target='_blank' title="Courriel"></a>
                            
								<?php } ?>
								
                            </section>
                        </section>    

                <?php } ?>
     
        </main>
    </section>

    <button id='ajouter'> 
        <a href="formulaire_ajout.php" title="Ajouter">
            <i class="fas fa-plus fa-3x"></i> 
        </a>
    </button>
   
</body>
</html>

