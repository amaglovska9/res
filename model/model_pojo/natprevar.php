<?php
class Natprevar
{
    private $natprevar_id;
    private $kolo;
    private $datum;
    private $vreme;
    private $tim1;
    private $tim2;
    private $poluvreme;
    private $postignati_golovi_tim1;
    private $postignati_golovi_tim2;


//setters
public function setNatprevarID($natprevar_id)
{
    $this->natprevar_id=$natprevar_id;
}
public function setKolo($kolo)
{
    $this->kolo=$kolo;
}
public function setDatum($datum)
{
    $this->datum=$datum;
}
public function setVreme($vreme)
{
    $this->vreme=$vreme;
}
public function setTim1($tim1)
{
    $this->tim1=$tim1;
}
public function setTim2($tim2)
{
    $this->tim2=$tim2;
}
public function setPoluvreme($poluvreme)
{
    $this->poluvreme=$poluvreme;
}
public function setPostignatiGoloviTim1($postignati_golovi_tim1)
{
    $this->postignati_golovi_tim1=$postignati_golovi_tim1;
}
public function setPostignatiGoloviTim2($postignati_golovi_tim2)
{
    $this->postignati_golovi_tim2=$postignati_golovi_tim2;
}


//geters
public function getNatprevarID()
{
    return $this->natprevar_id;
}
public function getKolo()
{
    return $this->kolo;
}
public function getDatum()
{
    return $this->datum;
}
public function getVreme()
{
    return $this->vreme;
}
public function getTim1()
{
    return $this->tim1;
}
public function getTim2()
{
    return $this->tim2;
}
public function getPoluvreme()
{
    return $this->poluvreme;
}
public function getPostignatiGoloviTim1()
{
    return $this->postignati_golovi_tim1;
}
public function getPostignatiGoloviTim2()
{
    return $this->postignati_golovi_tim2;
}

}
?>