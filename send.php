<?php



$data = $_POST;

$list = array(
         array('Equipo','Lider Nombre','Lider Apellidos', 'Institucion/Colegio', 'Correo Electronico', 'Teléfono', 'Edad', 'Participante Nombres', 'Participante Correo')
     );

$participantes = array();

foreach ($data["competitor_name"] as $key => $value) 
{
 $participantes = array( 
                        $data['team_name'], 
                        $data['team_lead'], 
                        $data['team_last_name'], 
                        $data['team_college'], 
                        $data['team_mail'], 
                        $data['team_phone'], 
                        $data['team_age'], 
                        $data["competitor_name"][$key], 
                        $data['competitor_email'][$key]
                       );
 array_push($list, $participantes);
}


$fp = fopen("equipos.xls", "w");

foreach ($list as $field) 
{
 fputcsv($fp, $field);
}

// send_mail();

// $strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // 
// $xlApp = new COM("Excel.Application");
// $xlBook = $xlApp->Workbooks->Add();
// var_dump($strPath);die;



// function send_mail($files =array("equipos.xls"))
// {
//     // email fields: to, from, subject, and so on
//     $to = "gutierrez.reyes23@gmail.com";
//     $from = "gamers.info.com";
//     $subject = "gutierrez.reyes23@gmail.com";
//     $message = "";
//     $headers = "From: $from";

//     // boundary
//     $semi_rand = md5(time());
//     $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

//     // headers for attachment
//     $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"   {$mime_boundary}\"";




//     // send
//     // $ok = @mail($to, $subject, $message, $headers);
//     // if ($ok) {
//     //     echo "OK";
//     // } else {
//     //     echo "FALSE";
//     // }

// }



