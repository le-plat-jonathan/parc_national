<?php

include_once 'Database.php';

class Trail extends Database {

//   private $pdo;
//   private $id;
//   public $name;
//   public $length;
//   public $difficulty;
//   public $longitude_A;
//   public $latitude_A;
//   public $longitude_B;
//   public $latitude_B;


//   public function __construct($pdo) {
//     $this->pdo = $pdo;
// }

  // create a trail
public function createTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B){


$sql= "INSERT INTO trail ( name, length, difficulty, longitude_A, latitude_A, longitude_B, latitude_B)
 VALUES( :name, :length, :difficulty, :longitude_A, :latitude_A, :longitude_B, :latitude_B)";

 $stmt= $this -> pdo-> prepare($sql);
 $stmt-> bindValue(':name', $name, PDO::PARAM_STR);
 $stmt-> bindValue(':length', $length, PDO::PARAM_STR);
 $stmt-> bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
 $stmt-> bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
 $stmt-> bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
 $stmt-> bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
 $stmt-> bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
 $stmt-> execute();

}
// get a trail by his id
public function getTrailById($id){

  $sql= "SELECT * FROM trail WHERE id = :id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->execute([$id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}
// get all trail
public function getAllTrail(){
$sql= "SELECT * FROM trail";
$stmt= $this->pdo->prepare($sql);
$stmt->execute();
return $stmt -> fetchAll(PDO::FETCH_ASSOC);

}
// update a trail
public function updateTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B){

  $sql= "UPDATE trail SET name= ?, length= ?, difficulty= ?, longtidude_A= ?, latitude_A=?, longitude_B=?, latitude_B=? WHERE id= :id  ";
  $stmt= $this->pdo-> prepare($sql);
  $stmt-> bindValue(':name', $name, PDO::PARAM_STR);
  $stmt-> bindValue(':length', $length, PDO::PARAM_STR);
  $stmt-> bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
  $stmt-> bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
  $stmt-> bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
  $stmt-> bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
  $stmt-> bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
  return $stmt-> execute([$name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B]);

}
// delete a trail
public function deleteTrail($id){
  $sql= "DELETE * FROM trail WHERE id= :id";
  $stmt= $this->pdo->prepare($sql);
  $stmt->execute([$id]);
 return ['message' => 'Trail deleted successfully'];
}


}


$trail= new Trail();
$trail-> createTrail('test', "5.00", 'easy', "15.85", "14.00", "55.00", "14.00");
var_dump($trail-> getAllTrail());