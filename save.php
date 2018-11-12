<?php

require_once "functions.php";

if(isset($_POST['team_name']))
{   
    $data = $_POST;
    
}
// 
// $model = new Functions;

// $list = array(
//          array('Equipo','Lider Nombre','Lider Apellidos', 'Institucion/Colegio', 'Correo Electronico', 'Telefono', 'Edad', 'Participante Nombres', 'Participante Correo')
//      );
// $participantes = array();

// foreach ($data["competitor_name"] as $key => $value) 
// {
//     $participantes = array( 
//                         $data['team_name'], 
//                         $data['team_lead'], 
//                         $data['team_last_name'], 
//                         $data['team_college'], 
//                         $data['team_mail'], 
//                         $data['team_phone'], 
//                         $data['team_age'], 
//                         $data["competitor_name"][$key], 
//                         $data['competitor_email'][$key]
//                        );
//     array_push($list, $participantes);
// }


// $fp = fopen("equipos.csv", "w");

// foreach ($list as $field) 
// {
//  fputcsv($fp, $field);
// }


