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
    
    <title>Cvtheque</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- CSS -->
    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <link href='css/normalize.css' rel='stylesheet' type='text/css'>

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&family=Original+Surfer&family=Zen+Dots&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/5f43c40889.js" crossorigin="anonymous"></script>


</head>
   
<body>
    <section id="pageContent">
        <h1>CVTHEQUE</h1>
        <nav id='nav'>
            <!-- ==== RECHERCHE ====  -->
            <form method='POST' id="search" >
                <label for="recherche par nom" id="labelSearch">Recherche</label>
                <input type="search" name="saisie" placeholder='Saisir ici'>
                <button type='submit' class="search" id='submit' >Go</button>
            </form>
            <!--  ==== FILTRES ====  -->
            <p id="filter">Trier par :</p>
            <div id="searchFilter" >
                    <!--PAR NOM-->
                    <section class="categorieTri">
                        <form method="post" action=''>
                            <select name="Nom" class='triFilter'>
                                <option selected <?php if (isset($selectnom) && $selectnom=="") echo "selected";?>>NOM</option>
                                <option <?php if (isset($selectnom) && $selectnom=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectnom) && $selectnom=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <input type="submit" name="submit" value="Tri" />
                        </form>
                    </section>
                    <!--PAR VILLE-->
                    <section class="categorieTri">
                        <form method='post' >
                            
                            <select name="Ville" class='triFilter'>
                                <option selected <?php if (isset($selectville) && $selectville=="") echo "selected";?>>VILLE</option>
                                <option <?php if (isset($selectville) && $selectville=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectville) && $selectville=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                           <input type="submit" name="submit" value="Tri" />
                        </form>
                    </section>
                    <!--PAR PROFIL-->
                    <section class="categorieTri">

                        <form method='post'>
                            <select name="Profil" class='triFilter'>
                                <option selected <?php if (isset($selectprofil) && $selectprofil=="") echo "selected";?>>PROFIL</option>
                                <option <?php if (isset($selectprofil) && $selectprofil=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectprofil) && $selectprofil=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <input type="submit" name="submit" value="Tri" />
                        </form>
                    </section>
                    <!--PAR AGE-->
                    <section class="categorieTri ">
                        <form method='post'>

                            <select name='Age' class='triFilter'>
                                <option selected <?php if (isset($selectage) && $selectage=="") echo "selected";?>>AGE</option>
                                <option <?php if (isset($selectage) && $selectage=="Croissant") echo "selected";?>>Croissant</option>
                                <option <?php if (isset($selectage) && $selectage=="Décroissant") echo "selected";?>>Décroissant</option>
                            </select>
                            <input type="submit" name="submit" value="Tri" />
                        </form>
                    </section>
            </div>
        </nav>

        <!--  ==== AFFICHAGE DES CARTES ====  -->
        <section id="bodyContainer" >
            <main id="cardContainer">
                <?php for ($i=0; $i<count($results);$i++) { //Parcourir le .csv ?>  
                    <section class='card'>

                        <!-- Boutons en haut de carte -->
                        <section class='cardButtons'>
                            <form action="formulaire_modif.php" method="POST">
                                <?php echo '<input name="idCarte" value="' . $results[$i] [0] . '" style="display: none">'; ?>
                                <button type='submit' class='modify'>
                                    <i class="fas fa-pencil-alt fa-1x"></i>
                                </button>
                            </form>

                            <form action="index.php" method="POST">
                                <?php echo '<input name="idCarte" value="' . $results[$i] [0] . '" style="display: none">'; ?>
                                <button name='submitDelete' type="submit" class='delete'>
                                    <i class="fas fa-trash-alt fa-1x"></i>
                                </button>
                            </form>
                        </section>
                        
                        <!-- Corps de carte -->        
                                <p class="name" title="Nom">
                                <?php 
                                //NOM
                                print_r($results[$i] [1]);
                                print (" ");
                                //PRENOM
                                print_r($results[$i] [2]);
                                ?>
                                </p>
                                
                                
                                <!--PROFIL-->
                                <p class="profil " title="Poste">
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
                                <p id="cachee " class='age' title="Age">
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
                                
                                <section class="contact">
                                
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
    </section>

    <!-- ==== BOUTON REDIRECTION FORMULAIRE AJOUT ==== -->
    <button id='add'> 
        <a href="formulaire_ajout.php" title="Ajouter">
            <i class="fas fa-plus fa-3x"></i> 
        </a>
    </button>
    <!-- ==== FOOTER ==== -->
    <footer id="footer">
        <p>	<span id="footerSymbols">&#169; <!-- &#x1f16d; &#127341; --></span> Copyright</p>
    </footer>
    
</body>
</html>

