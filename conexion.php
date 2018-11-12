<?php
  class Conexion{
      public function Conectar(){
         $root = 'barnaedu_user_bba';
         $dbname = 'barnaedu_bba';
         $host = 'barna.edu.do';
         $password = 'MaSl@(R0M_=d#=hsYg';

        return $conexion = new PDO("mysql:host=$host;dbname=$dbname", $root, $password);
    }
  }
?>
