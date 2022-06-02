<?php
class Users
{
    private $user_id;
    private $uname;
    private $passw;
    private $role;

    //setters
public function setUserID($user_id)
{
    $this->user_id=$user_id;
}
public function setUserName($uname)
{
    $this->uname=$uname;
}
public function setPassword($passw)
{
    $this->passw=$passw;
}
public function setRole($role)
{
    $this->role=$role;
}
  //getters
public function getUserID()
{
    return $this->user_id;
}
public function getUserName()
{
    return $this->uname;
}
public function getPassword()
{
    return $this->passw;
}
public function getRole()
{
    return $this->role;
}

}
?>