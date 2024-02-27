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


function getAllPets($conx) {
  try {
      $sql = "SELECT * FROM pets";
      $stm = $conx->prepare($sql);
      $stm->execute();
      return $stm->fetchAll();
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

function addPet($conx,$data) {
  try {
  $sql="INSERT INTO petS (name, photo, kind, weigth, age, breed, location) VALUES (:name, :photo, :kind, :weigth, :age, :breed, :location)";

  $smt=$conx->prepare($sql);

  if ($smt->execute($data)) {
    $_SESSION['msg'] = 'The ' . $data['name'] . ' pet was added successfully.' ;
    return true;
  } else {
    return false;
  }



} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
  }
}

function getPet($conx, $id) {
  try {
      $sql = "SELECT * FROM pets WHERE id = :id";
      $stm = $conx->prepare($sql);
      $stm->execute(['id' => $id]);
      return $stm->fetch();
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

function updatePet($conx, $data) {
  try {
      if(count($data) == 7) {
          $sql = "UPDATE pets SET name=:name, kind=:kind, weigth=:weigth, 
                                  age=:age, breed=:breed, location=:location
                              WHERE id = :id";
      } else {
          $sql = "UPDATE pets SET name=:name, photo=:photo, kind=:kind, 
                                  weigth=:weigth, age=:age, breed=:breed, 
                                  location=:location WHERE id = :id";
      }
      $smt = $conx->prepare($sql); 
      
      if ($smt->execute($data)) {
          $_SESSION['msg'] = 'The ' . $data['name'] . ' pet was updated successfully.' ;
          return true;
      } else {
          return false;
      } 

  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

function deletePet($conx, $id) {
  try {
      $sql = "DELETE FROM pets WHERE id = :id";
      $stm = $conx->prepare($sql);
      if($stm->execute(['id' => $id])) {
          $_SESSION['msg'] = 'The pet was deleted successfully.' ;
          return true;
      }
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

?>