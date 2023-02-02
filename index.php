<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agence automobile</title>
    
</head>
<body>

<div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 150px;">
  </div>

  <div class="main">
    
    <a href="" class="titulo" >ACCUEIL </a>
    <a href="" class="titulo" >ACHETER UNE VOITURE</a>
    <a href=""  class="titulo" >VENDRE UNE VOITURE</a>
    <a href=""  class="titulo" >ATELIER & CARTE GRISE</a>
    <a href=""  class="titulo" >ACTUALITÉS</a>
    <a href=""  class="titulo" >A PROPOS DE NOUS</a>
    <a href=""  class="titulo" >CONTACT</a>

  </div>

</div>

<br>

<?php

   //le fichier xml est a /tmp
   $fichier = '/tmp/agence.xml';
   $contenu = simplexml_load_file($fichier);


   $arrayMarque = array(); 

    //guarda el total de vehiculos
 $contar=0;
 foreach($contenu->annonce as $voiture){
  $arrayMarque[$contar]=''.$voiture->vehicule->marque.'';
  //echo '<br>'.$arrayMarque[$contar];
  $contar++;
  
  //echo $contar.'<br>' ;  
 }

 //print_r(array_count_values($arrayMarque));
//***************************** */ 

?>

<form action="resultats.php" method="post">
  <label for="cars">Marque:</label>

  <select name="marquename" id="carsmarque" class="marque">
                        <option value="">Marque</option>
                        <?php

                            $marque_voiture = array();

                            foreach($contenu->annonce as $voiture)
                            {
                                $vehicule  = ''.$voiture->vehicule->marque.'';

                                if(in_array($vehicule, $marque_voiture)){}
                                else {
                                    array_push($marque_voiture, $vehicule);
                                }

                            }

                            asort($marque_voiture);

                            foreach ($marque_voiture as $vehicule)
                            {

                                $nom_voiture = $vehicule;
                                $nbr_audi = 0;
                                foreach ($contenu->annonce as $annonce) {
                                    if ($annonce->vehicule->marque == $nom_voiture) {
                                        // affiche card
                                        $nbr_audi++;
                                    }
                                }

                                echo ' <option value="'.$vehicule.'">'.$vehicule.'  ('.$nbr_audi.') </option>';
                            }
                        ?>
                    </select>

  <label for="cars">Modele:</label>
<select name="modelename" id="carsmodele" class="modele">
                        <option value="">Modele</option>
                        <?php

                            $modele_voiture = array();

                            foreach($contenu->annonce as $voiture)
                            {
                                $vehicule  = ''.$voiture->vehicule->modele.'';

                                if(in_array($vehicule, $modele_voiture)){}
                                else {
                                    array_push($modele_voiture, $vehicule);
                                }
                                // array_push($modele_voiture, $vehicule);
                            }

                            asort($modele_voiture);

                            foreach ($modele_voiture as $vehicule)
                            {

                                $nom_voiture = $vehicule;
                                $nbr_audi = 0;
                                foreach ($contenu->annonce as $annonce) {
                                    if ($annonce->vehicule->modele == $nom_voiture) {
                                        // affiche card
                                        $nbr_audi++;
                                    }
                                }
                                //nombre d'audi
                                // echo $nbr_audi;

                                echo ' <option value="'.$vehicule.'">'.$vehicule.'  ('.$nbr_audi.') </option>';
                            }
                        ?>
                    </select>

  </select>


  <label for="cars">Km:</label>
  <select id="cars" name="kmcars">
    <option value="" placeholder="kilometrage">kilometrage</option>
    <option value="10000">< 10.000 km</option>
    <option value="50000">< 50.000 km</option>
    <option value="100000">< 100.000 km</option>
    <option value="150000">< 150.000 km</option>
    <option value="200000"> 200.000 km +</option>

  </select>

  <input type="text" id="fname" name="annee_min" placeholder="Annee min">
  <input type="text" id="fname" name="annee_max" placeholder="Annee max">
  <input type="text" id="fname" name="prix_min" placeholder="Prix min">
  <input type="text" id="fname" name="prix_max" placeholder="Prix max">

  <input type="submit">
</form>

<?php

 //muestra el total de vehiculos
 $contar=0;
 foreach($contenu->annonce as $voiture){
  $contar++;
  //echo $contar.'<br>' ;  
 }
 echo '<br> total vehicules <br>'.$contar;
//***************************** */  

echo '<br>';

echo '<div class="carros">';

//recorre total de vehiculos y asigna los valores a las variables
   foreach($contenu->annonce as $voiture){
    
    echo '
    <div style="width:20%; border:50px;">
      <img src="'.$voiture->photos->photo.'" style="border:4px; width:100%;"> <br>
      Couleur : '.$voiture->vehicule->couleur.' <br>
      Modele : '.$voiture->vehicule->modele.'   <br> 
      Marque : '.$voiture->vehicule->marque.'  <br>
      prix :  <h1>'.$voiture->offre->prix.' € </h1> 
    </div>  
    
    ';  
 }
 echo '</div>';


?>

</body>
</html>