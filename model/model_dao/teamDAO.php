<?php
require_once "model_pojo/team.php";

class TeamDAO extends Team
{
    private $table_name="team";
    private $database = null;
    public function __construct($DB)
    {
        $this->database = $DB;
    }

    public function insertTeam()
	{
      $team_name = parent::getTeamName();
	  
	  $columns="team_name";
	  $columns_value="'$team_name'";

	  return $this->database->insertRow($this->table_name,$columns,$columns_value);
    }
    
    public function updateTeam()
	{
	  $pk_name="team_id";
	  $pk_value  = parent::getTeamID();
		
      $team_name = parent::getTeamName();

	  $columns="team_name='$team_name'";

	  return $this->database-> updateRow($this->table_name, $columns, $pk_name, $pk_value);
    }
    
    public function deleteTeam()
	{
		$pk_name="team_id";
        $pk_value  = parent::getTeamID();
		
		return $this->database-> deleteRow($this->table_name, $pk_name, $pk_value);

	}

	public function selectTeam()
	{
		return $this->database->selectRow($this->table_name);
	}
}
?>