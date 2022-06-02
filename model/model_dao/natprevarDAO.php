<?php
require_once "model_pojo/natprevar.php";

class NatprevarDAO extends Natprevar
{
    private $table_name="natprevari";
    private $database = null;
    public function __construct($DB)
    {
        $this->database = $DB;
    }

    public function insertNatprevar()
	{
      $kolo = parent::getKolo();
      $datum = parent::getDatum();
      $vreme = parent::getVreme();
      $tim1 = parent:: getTim1();
      $tim2 = parent:: getTim2();
      $poluvreme = parent::getPoluvreme();
      $postignati_golovi_tim1 = parent::getPostignatiGoloviTim1();
      $postignati_golovi_tim2 = parent::getPostignatiGoloviTim2();

	  $columns="kolo, datum, vreme, tim1, tim2, poluvreme, postignati_golovi_tim1, postignati_golovi_tim2";
	  $columns_value="$kolo, '$datum', '$vreme', '$tim1', '$tim2', '$poluvreme', $postignati_golovi_tim1, $postignati_golovi_tim2";

	  return $this->database->insertRow($this->table_name,$columns,$columns_value);
    }
    
    public function updateNatprevar()
	{
	  $pk_name="natprevar_id";
      $pk_value  = parent::getNatprevarID();
      
      $kolo = parent::getKolo();
      $datum = parent::getDatum();
      $vreme = parent::getVreme();
      $tim1 = parent:: getTim1();
      $tim2 = parent:: getTim2();
      $poluvreme = parent::getPoluvreme();
      $postignati_golovi_tim1 = parent::getPostignatiGoloviTim1();
      $postignati_golovi_tim2 = parent::getPostignatiGoloviTim2();

	  $columns="kolo=$kolo, datum='$datum', vreme='$vreme', tim1='$tim1', tim2='$tim2', poluvreme='$poluvreme', postignati_golovi_tim1=$postignati_golovi_tim1, postignati_golovi_tim2=$postignati_golovi_tim2";

	  return $this->database-> updateRow($this->table_name, $columns, $pk_name, $pk_value);
    }
    
    public function deleteNatprevar()
	{
		$pk_name="natprevar_id";
        $pk_value  = parent::getNatprevarID();
		
		return $this->database-> deleteRow($this->table_name, $pk_name, $pk_value);

	}

	public function selectNatprevar()
	{
        return $this->database->selectRow($this->table_name);
	}
}
?>
