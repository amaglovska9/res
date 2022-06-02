<?php
require_once "../lib/database.php";
require_once "model_dao/NatprevarDAO.php";
$data=json_decode(file_get_contents("php://input")); //zemi ja sodrzinata od file-ot
var_dump($data); //printaj niza
//echo $data[0]->action; //zemame edna vrednost od data [pozicija]
$obj = new Database();
$objDAO= new NatprevarDAO($obj);
$action= $data[0]->action;
switch($action)
{
    case "insert":
        echo "Insert natprevar";
        $kolo=$data[0]->kolo;
        $datum=$data[0]->datum;
        $vreme=$data[0]->vreme;
        $tim1=$data[0]->tim1;
        $tim2=$data[0]->tim2;
        $poluvreme=$data[0]->poluvreme;
        $postignati_golovi_tim1=$data[0]->postignati_golovi_tim1;
        $postignati_golovi_tim2=$data[0]->postignati_golovi_tim2;

        $objDAO->setKolo($kolo);
        $objDAO->setDatum($datum);
        $objDAO->setVreme($vreme);
        $objDAO->setTim1($tim1);
        $objDAO->setTim2($tim2);
        $objDAO->setPoluvreme($poluvreme);
        $objDAO->setPostignatiGoloviTim1($postignati_golovi_tim1);
        $objDAO->setPostignatiGoloviTim2($postignati_golovi_tim2);

        $objDAO->insertNatprevar();

    break;
    case "update":
        echo "Update natprevar";
        $objDAO->setNatprevarID();
      
        $objDAO->setKolo();
        $objDAO->setDatum();
        $objDAO->setVreme();
        $objDAO->setTim1();
        $objDAO->setTim2();
        $objDAO->setPoluvreme();
        $objDAO->setPostignatiGoloviTim1();
        $objDAO->setPostignatiGoloviTim2();
        
        $objDAO->updateNatprevar();

    break;
    case "delete":
        echo "Delete natprevar";
        $pk_id = $data[0]->pk_id;

        $objDAO->setNatprevarID($pk_id);

        $objDAO->deleteNatprevar();
    break;

    default:
    break; 
}
?>