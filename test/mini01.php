
     <?php
     
     # 1. Création d'un objet XML
     echo "Agence automobile";
     
     $elt = new SimpleXMLElement("<exemple>\nVide !\n</exemple>\n") ;

     
    echo (string) $elt->property;
    

     echo "Un élément créé par SimpleXMLElement a pour classe : " .get_class($elt)."\n" ;
     echo "Contenu d'un tel objet via la méthode asXML() :\n" ;
     echo $elt->asXML() ." \n" ;
     echo "deux";
     
     # 2. Lecture d'un fichier XML
     
     $mini1 = simplexml_load_file("agence.xml") ;
     echo "Lecture OK via la fonction simplexml_load_file(). Contenu : \n" ;
     echo $mini1->asXML() ." \n" ;
     
     # 3. Lecture d'une chaine XML
     
     $mini2 =  new SimpleXMLElement(file_get_contents("agence.xml")) ;
     echo "Création OK via le constructeur. Contenu : \n" ;
     echo $mini2->asXML() ." \n" ;
     

     $sxml= new SimpleXmlElement($xmlstr);

     if ((string) $elt->property== "somevalue") {
         echo (string) $elt->property;
     }

     ?>