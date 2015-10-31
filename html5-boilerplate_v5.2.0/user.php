<?php
require 'database.php';

Class User{

  
  public static function create($nombre, $mail, $numero, $mensaje) {
    $sql = 'INSERT INTO user (nombre, mail, numero, mensaje) VALUES (:nombre, :mail, :numero, :mensaje)';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':mail', $mail);
      $stmt->bindParam(':numero', $numero);
      $stmt->bindParam(':mensaje', $mensaje);
      $stmt->execute();
      Database::disconnect();
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

  public static function update($nombre){
    $sql = 'UPDATE user SET nombre=:nombre, mail=:mail, numero=:numero, mensaje=:mensaje WHERE id=:id';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':mail', $mail);
      $stmt->bindParam(':numero', $numero);
      $stmt->bindParam(':mensaje', $mensaje);
      $stmt->execute();
      Database::disconnect();
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

  public static function delete($id){
    $sql = 'DELETE FROM user WHERE id=:id';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      Database::disconnect();
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

  public static function readAll(){
    $sql = "SELECT * FROM user ORDER BY id";
    try {
        $db = Database::connect();
        $stmt = $db->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        Database::disconnect();
        return $users;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
  }

  $nombre=$_GET["nombre"];
  $mail=$_GET["mail"];
  $numero=$_GET["numero"];
  $mensaje=$_GET["mensaje"];
  create($nombre,$mail,$numero,$mensaje);
}

?>