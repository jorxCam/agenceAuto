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
<h1>Show Results</h1>
<br>

<?php


    $marquename='';
    $modelename='';
    $kmcars='';
    $annee_min='';
    $annee_max='';
    $prix_min='';
    $prix_max='';


   //le fichier xml est au même niveau que le fichier PHP qui le manipule
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
 /*
 $arrlength=count($arrayMarque);
 
 for($x=0;$x<$arrlength;$x++)
   {
   echo $arrayMarque[$x];
   echo "<br>";
   }
*/
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
                                // array_push($marque_voiture, $vehicule);
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
                                //nombre d'audi
                                // echo $nbr_audi;

                                echo ' <option value="'.$vehicule.'">'.$vehicule.'  ('.$nbr_audi.') </option>';
                            }
                        ?>
        </select>
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
    <option value="kilometrage">kilometrage</option>
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
//  //muestra el total de vehiculos
//  $contar=0;
//  foreach($contenu->annonce as $voiture){
//   $contar++;
//   //echo $contar.'<br>' ;  
//  }
//  echo '<br> total vehicules disponibles dans la recherche <br>'.$contar;

//***************************** */  

echo '<br>';

$marquename= $_POST['marquename'];
$modelename= $_POST['modelename'];
$kilometrage= $_POST['kmcars'];
$annee_min= $_POST['annee_min'];
$annee_max= $_POST['annee_max'];
$prix_min= $_POST['prix_min'];
$prix_max= $_POST['prix_max'];

/*
$marquename= $_GET['marquename'];
$modelename= $_GET['modelename'];
$kilometrage= $_GET['kmcars'];
$annee_min= $_GET['annee_min'];
$annee_max= $_GET['annee_max'];
$prix_min= $_GET['prix_min'];
$prix_max= $_GET['prix_max'];


echo $marquename;
echo $modelename;
echo $kilometrage;
echo $annee_min;
echo $annee_max;
echo $prix_min;
echo $prix_max;
*/


echo '<br>';


$contarresult='0';

foreach($contenu->annonce as $voiture){
 

 if((($marquename == ''.$voiture->vehicule->marque.'') || $marquename =='' ) && 
  (($modelename == ''.$voiture->vehicule->modele.'') || $modelename=='' ) && 
  (($kilometrage > ''.$voiture->vehicule->kilometrage.'') || $kilometrage=='' ) &&
  (  (  ($annee_min <= ''.$voiture->vehicule->millesime.'')  )  || $annee_min==''  ) &&
  (  (  ($annee_max >= ''.$voiture->vehicule->millesime.'')  )  || $annee_max==''  ) &&
  (  (  ($prix_min <= ''.$voiture->offre->prix.'')  )  || $prix_min==''  ) &&
  (  (  ($prix_max >= ''.$voiture->offre->prix.'')  )  || $prix_max==''  ) 


  ) {
     $contarresult++;  
     } 
     
}

echo 'resultat => ' .$contarresult;

echo '<div class="carros">';


//recorre total de vehiculos y asigna los valores a las variables
   foreach($contenu->annonce as $voiture){
    

    if((($marquename == ''.$voiture->vehicule->marque.'') || $marquename =='' ) && 
     (($modelename == ''.$voiture->vehicule->modele.'') || $modelename=='' ) && 
     (($kilometrage > ''.$voiture->vehicule->kilometrage.'') || $kilometrage=='' ) &&
     (  (  ($annee_min <= ''.$voiture->vehicule->millesime.'')  )  || $annee_min==''  ) &&
     (  (  ($annee_max >= ''.$voiture->vehicule->millesime.'')  )  || $annee_max==''  ) &&
     (  (  ($prix_min <= ''.$voiture->offre->prix.'')  )  || $prix_min==''  ) &&
     (  (  ($prix_max >= ''.$voiture->offre->prix.'')  )  || $prix_max==''  ) 


     ) {        
        echo '
        <div style="width:20%; border:50px;">

            <a href="voiture.php?id="'.$voiture->id.'" ">
            <img src="'.$voiture->photos->photo.'" alt="page voiture" style="border:4px; width:100%;"> <br>
            </a>

            Kilometrage : '.$voiture->vehicule->kilometrage.' <br>
            Modele : '.$voiture->vehicule->modele.'   <br> 
            Marque : '.$voiture->vehicule->marque.'  <br>
            Annee : '.$voiture->vehicule->millesime.'  <br>
            prix :  <h1>'.$voiture->offre->prix.' € </h1> 
        </div>  
        ';  
        
    //<a href='page2.php?id=2489&user=tom'>link to page2</a>
    
        } 
        
 }
 echo '</div>';





?>


</body>
</html>