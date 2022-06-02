<?php
class Database
{
    //class atributes - sekogas mora da imame vakvi pocetni atributi!
    private $db_servername = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "results";
    private $conn  = null; //atribut za konekcijata pod default ja postavuvame na null

    public function __construct(){
    
    try
    {
      $this->conn = new PDO("mysql:host=$this->db_servername;dbname=$this->db_name;charset=utf8mb4", $this->db_username, $this->db_password);
  // set the PDO error mode to exception
  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
    }catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  public function insertRow($table_name,$columns,$columns_value){
   $sql = "INSERT INTO $table_name ($columns)
    VALUES ($columns_value)";
    // use exec() because no results are returned
    $this->conn->exec($sql);
  }

    public function deleteRow($table_name,$pk_name,$pk_value){
      $sql = "DELETE FROM $table_name    WHERE $pk_name=$pk_value";
      $this->conn->exec($sql);
    }

    public function deleteAllRows($table_name){
      $sql="DELETE FROM $table_name";
      $this->conn->exec($sql);
    }
    
    public function selectRow($table_name){
      $sql="SELECT * FROM $table_name";
      $stmt=$this->conn->prepare($sql);
      $stmt->execute(); 
    return $stmt->fetchAll();
    }

    public function updateRow($table_name,$columns,$pk_name,$pk_value){
      $sql = "UPDATE $table_name SET $columns WHERE $pk_name=$pk_value";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      // {
      //   $response = array("myData") => ['Успешно додаден резултат'];
      // }
    }

    public function callStoredProcedureWithParams($StoredProcedure,$column_value){
      $sql= " CALL ".$StoredProcedure."('".$table_name."',".$pk_value.")";
      $con=$this->conn;
      $stmt=$con->prepare($sql);
      $stmt->execute();
    }


}



?>