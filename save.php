<?php

require_once "functions.php";

if(isset($_POST['team_name']))
{   
    $data = $_POST;
    $model = new Functions;

    $model->insertInto = "teams";
    $team      = $data['team_name'];
    $lead      = $data['team_lead'];
    $lead_last = $data['team_last_name'];
    $college   = $data['team_college'];
    $mail      = $data['team_mail'];
    $phone     = $data['team_phone'];
    $age       = $data['team_age'];

    $model->insertColumns = 'team, team_lead, team_lead_last_name, college, email, phone, age';
    $model->insertValues = "'$team', '$lead', '$lead_last', '$college', '$mail', '$phone', '$age'";

    $model->Create();
    $mensaje = $model->mensaje;

    $last_id = $model->max_id($team,$mail)['ID'];

    if($last_id > 0)
    {
        $model->insertInto    = "participantes";
        $model->insertColumns = 'name, email, team_id';
        foreach ($data["competitor_name"] as $key => $value) 
        {
            $comp_name  = $data["competitor_name"][$key];
            $comp_email = $data['competitor_email'][$key];
            $model->insertValues  = "'$comp_name', '$comp_email', '$last_id'";
            $model->Create();          
            echo $model->mensaje;                      
        }   
    }
    
}
