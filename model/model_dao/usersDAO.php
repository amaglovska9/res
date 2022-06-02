<?php
require_once "model_pojo/users.php";

class UsersDAO extends UsersDAO
{
    private $table_name="users";
    private $database = null;
    public function __construct($DB)
    {
        $this->database=$DB;
    }

    public function insertUsers()
    {
        $uname = parent::getUserName();
        $passw = parent::getPassword();
        $role = parent::getRole();

        $columns="uname, passw, role";
        $columns_value="'$uname', '$passw', '$role'";

        return $this->database->insertRow($this->table_name,$columns,$columns_value);
    }

    public function updateUsers()
    {
        $pk_name="user_id";
        $pk_value = parent::getUserID();

        $uname = parent::getUserName();
        $passw = parent::getPassword();
        $role = parent::getRole();

        $columns="uname='$uname', passw='$passw', role='$role'";
     
        return $this->database-> updateRow($this->table_name, $columns, $pk_name, $pk_value);
    }

    public function deleteUsers()
    {
        $pk_name="user_id";
        $pk_value = parent::getUserID();

        return $this->database-> deleteRow($this->table_name, $pk_name, $pk_value);
    }

    public function selectUsers()
    {
        return $this->database->selectRow($this->table_name);
    }
}
?>
