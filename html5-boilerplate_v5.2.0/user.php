<?php

function connect() {
    $dbhost='localhost';
    $dbuser='peter';
    $dbpass='peter';
    $dbname='contactme';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

  $pnombre=$_GET["name"];
  $pmail=$_GET["email"];
  $pnumero=$_GET["phone"];
  $pmensaje=$_GET["message"];

function create($nombre, $mail, $numero, $mensaje) {

  $sql = 'INSERT INTO user (nombre, mail, numero, mensaje) VALUES (:nombre, :mail, :numero, :mensaje)';
  try {
    $db = connect();
    $stmt = $db->prepare($sql);
      $stmt->bindParam('nombre', $nombre);
      $stmt->bindParam('mail', $mail);
      $stmt->bindParam('numero', $numero);
      $stmt->bindParam('mensaje', $mensaje);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
create($pnombre,$pmail,$pnumero,$pmensaje);

?>