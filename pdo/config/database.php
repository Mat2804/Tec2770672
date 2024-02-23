<?php

// conection

try {
  $conx= new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER,PASS);
//if ($conx){
   //Hecho "<h4> Si conecto </h4>";
//}

} catch (PDOException $e) {
    echo "Error: ". $e->getMessage();
}

function getAllPets($conx){
    try {
      $sql="SELECT * FROM pets";
      $stm=$conx->prepare($sql);
      $stm->execute();
      return $stm->fetchAll();
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    
}

function addPet($conx,$data) {
  try {
  $sql="INSERT INTO petS (name, photo, kind, weigth, age, breed, location) VALUES (name, photo, kind, weigth, age, breed, location);";

  $smt=$conx->prepare($sql);

  if ($smt->execute($data)) {
    return true;
  } else {
    return false;
  }



} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
  }
}

?>