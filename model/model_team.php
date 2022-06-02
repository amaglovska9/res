<?php
require_once "../lib/database.php";
require_once "model_dao/TeamDAO.php";
$data=json_decode(file_get_contents("php://input")); //zemi ja sodrzinata od file-ot
var_dump($data); //printaj niza
// echo $data[0]->action; //zemame edna vrednost od data [pozicija]
$obj = new Database();
$objDAO= new TeamDAO($obj);
$action= $data[0]->action;
switch($action)
{
    case "insert":
        echo "Insert team";
        $team_name=$data[0]->team_name;

        $objDAO->setTeamName($team_name);

        $objDAO->insertTeam();

    break;
    case "update":
        echo "Update team";
        $objDAO->setTeamID();
        $objDAO->setTeamName();

        $objDAO->updateTeam();

    break;
    case "delete":
        echo "Delete team";
        $pk_id = $data[0]->pk_id;

        $objDAO->setTeamID($pk_id);

        $objDAO->deleteTeam();
    break;

    default:
    break; 
}
?>