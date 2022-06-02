<?php
require_once "../lib/database.php";
require_once "model_dao/UsersDAO.php";
$data=json_decode(file_get_contents("php://input"));
var_dump($data);

$obj = new Database();
$objDAO= new UsersDAO($obj);
$action = $data[0]->action;
switch($action)
{
    case "insert":
        echo "Insert user";
        $uname=$data[0]->uname;
        $passw=$data[0]->passw;
        $role=$data[0]->role;

        $objDAO->setUserName($uname);
        $objDAO->setPassword($passw);
        $objDAO->setRole($role);

        $objDAO->insertUsers();
    break;
    case "update":
        echo "Update user";
        $objDAO->setUserID();

        $objDAO->setUserName($uname);
        $objDAO->setPassword($passw);
        $objDAO->setRole($role);

        $objDAO->updateUsers();
    break;
    case "delete":
        echo "Delete user";
        $pk_id=$data[0]->pk_id;

        $objDAO->setUserID($pk_id);

        $objDAO->deleteUsers();
    break;

    default:
break;
}
?>