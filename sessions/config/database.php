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


function loginUser($conx, $email, $password) {
  try {
      $sql = "SELECT * FROM users WHERE email= :email LIMIT 1";
      $stm = $conx->prepare($sql);
      $stm->execute();
      return $stm->fetchAll();
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}


?>