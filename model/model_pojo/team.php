<?php
class Team
{
    private $team_id;
    private $team_name;

//setters
public function setTeamID($team_id)
{
    $this->team_id=$team_id;
}
public function setTeamName($team_name)
{
    $this->team_name=$team_name;
}

//geters
public function getTeamID()
{
    return $this->team_id;
}
public function getTeamName()
{
    return $this->team_name;
}

}
?>