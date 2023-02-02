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
<h1>page voiture</h1>
<br>
<?php

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
?>

</body>
</html>