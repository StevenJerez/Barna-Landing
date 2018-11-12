<?php
  require "conexion.php";
 
  class Functions{
    //insert
    public $insertInto;
    public $insertColumns;
    public $insertValues;
    //
    public $mensaje;

      public function Create(){
        //
        $model = new Conexion;
        $conexion = $model->conectar();
        //
        $insertInto = $this->insertInto;
        $insertColumns = $this->insertColumns;
        $insertValues = $this->insertValues;
        //
        $sql= "INSERT INTO $insertInto($insertColumns) VALUES ($insertValues)";
        //
        $consulta = $conexion->prepare($sql);
        //
          if(!$consulta){
            $this->mensaje = "err";
          } else{
            $consulta->execute();
            $this->mensaje = "ok";
          }
      }
      function max_id($team, $email)
      {
        $model = new Conexion;
        $conexion = $model->conectar();
        $temp = array();
        $sql = "SELECT 
                  MAX(t.`ID`) AS 'ID'
                FROM
                  `teams` t 
               WHERE t.`team` = '{$team}' 
                  AND t.`email` = '{$email}'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        while($filas = $consulta->fetch()){
                $temp[]  = $filas;
        }
        return $temp[0];
      }
      
  }
