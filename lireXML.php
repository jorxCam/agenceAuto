<?php


 
$zip = new ZipArchive;
  
// Zip File Name
if ($zip->open('agence.zip') === TRUE) {
  
    // Unzip Path
    $zip->extractTo('/tmp');
    $zip->close();
    echo 'File zip extract ok!<br>';
} else {
    echo 'Unzipped Process failed';
}




   //le fichier xml est au même niveau que le fichier PHP qui le manipule
   $fichier = '/tmp/agence.xml';
   $contenu = simplexml_load_file($fichier);
   

/*muestra el total de vehiculos
   echo '<br> total vehicules <br>';
   $contar=0;
   foreach($contenu->annonce as $voiture){
    $contar++;
    //echo $contar.'<br>' ;  
   }
   echo $contar;
 //***************************** */  
?>