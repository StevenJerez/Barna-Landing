<?php
  class Conexion{
      public function Conectar(){
         $root = 'root';
         $dbname = 'barnaedu_bba';
         $host = 'localhost';
         $password = '';

        return $conexion = new PDO("mysql:host=$host;dbname=$dbname", $root, $password);
    }
  }
?>
