<?php
  session_start();
//Combrovar abans d'anar que aquest carret existeix 
 ///passar a phf

  
  header("Location: compra/compra-".session_id().".xml");


   
    
?>  