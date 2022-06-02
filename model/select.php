<?php
require_once "../lib/database.php";
$data=json_decode(file_get_contents("php://input"));
// var_dump($data);
$DB=new Database();
$data =array();

$table_name=$_GET["table_name"];
switch($table_name){
	case "team":
		require_once "model_dao/teamDAO.php";
		$objTeamDAO	=	new TeamDAO($DB);
		$results  =		$objTeamDAO->selectTeam();
		foreach($results as $row) //loop koj treba da vrti se duri ima podatoci
		{
			//associative   "property"	=> "value"
			$data[]=array(	"team_id"	=> $row["team_id"],
							"team_name" => $row["team_name"]
							
			);
		}
	break;
	case "natprevari":
		require_once "model_dao/natprevarDAO.php";
		$objNatprevarDAO	=	new NatprevarDAO($DB);
		$results  =		$objNatprevarDAO->selectNatprevar();
		foreach($results as $row) 
		{
			$data[]=array(	"natprevar_id"	=> $row["natprevar_id"],
							"kolo" => $row["kolo"],
							"datum" => $row["datum"],
							"vreme" => $row["vreme"],
							"tim1" => $row["tim1"],
							"tim2" => $row["tim2"],
							"poluvreme" => $row["poluvreme"],
							"postignati_golovi_tim1" => $row ["postignati_golovi_tim1"],
							"postignati_golovi_tim2" => $row ["postignati_golovi_tim2"]

			);
		}
	break;
	case "users":
		require_once "model_dao/usersDAO.php";
		$objUsersDAO = new UsersDAO($DB);
		$results = $objUsersDAO->selectUsers();
		foreach($results as $row)
		{
			$data[]=array( "user_id" => $row["user_id"],
						   "uname"   => $row["uname"],
						   "email"   => $row["email"],
						   "passw"   => $row["passw"],
						   "role"    => $row["row"]
		);
	 
		}
	
break;
}
echo json_encode($data);
?>
