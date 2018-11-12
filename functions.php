<?php
  require "conexion.php";
 
  class Functions{
    //insert
    public $insertInto;
    public $insertColumns;
    public $insertValues;
    //Read
    public $select;
    public $from;
    public $condition;
    public $rows;
    //Update
    public $update;
    public $set;
    //
    public $deleteFrom;
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
      public function Read(){
        $model = new Conexion;
        $conexion = $model->conectar();
        //
        $select = $this->select;
        $from = $this->from;
        $condition = $this->condition;
        //sql
            if($condition != ''){
              $condition = " WHERE " . $condition;
            }
            //
            $sql = "SELECT $select FROM $from $condition";
            //
            $consulta = $conexion->prepare($sql);
            $consulta->execute();

            while($filas = $consulta->fetch()){
              $this->rows[]  = $filas;
            }
      }
      public function Update(){
        $model = new Conexion;
        $conexion = $model->conectar();
        //
        $update = $this->update;
        $set = $this->set;
        $condition = $this->condition;
        //
          if($condition != ''){
            $condition = " WHERE ". $condition;
          }
       //SQL
       $sql = "UPDATE $update SET $set $condition";
       $consulta = $conexion->prepare($sql);

           if(!$consulta){
             $this->mensaje = "HA OCURRIDO UN ERROR AL ACTUALIZAR";
           } else {
             $consulta->execute();
             $this->mensaje = "Enhorabuena, registro guardado";
           }
      }

      public function Delete(){
        $model = new Conexion;
        $conexion = $model->conectar();
        $deleteFrom = $this->deleteFrom;
        $condition = $this->condition;
        //
        if($condition != ""){
          $condition = " WHERE " . $condition;
        }
        //
        $sql = "DELETE FROM $deleteFrom $condition";
        //
        $consulta = $conexion->prepare($sql);
        //
        if(!$consulta){
          $this->mensaje = "Error eliminar el registro";
        }else{
          $consulta->execute();
          $this->mensaje = "El registro ha sido eliminado";
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
