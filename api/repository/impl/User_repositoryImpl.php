<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 12:27 AM
 */
require_once __DIR__."/../User_repository.php";
class User_repositoryImpl implements User_repository
{

    private $connection;
    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }
    /*public function __construct()
    {
        $this->connection = new mysqli();
    }*/

    public function getUsers()
    {
        $resultSet = $this->connection->query("select * from user");
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($username)
    {
        $resultSet = $this->connection->query("select * from user where username='{$username}'");
        return $resultSet->fetch_assoc();
    }

    public function saveUser($username, $name, $password, $photo)
    {
        $pstm = $this->connection->prepare("insert intp user values (?,?,?,?,?)");
        $pstm->bind_param("ssssi",$param1,$param2,$param3,$param4,$param5);
        $param1 = $username;
        $param2 = $name;
        $param3 = $password;
        $param4 = $photo;
        $param5 = 0;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function updateUser($username, $name, $password, $photo)
    {
        $pstm = $this->connection->prepare("update user set name=?, password = ?, photo = ? where username = ?");
        $pstm->bind_param("ssss",$param1,$param2,$param3,$param4);
        $param1 = $name;
        $param2 = $password;
        $param3 = $photo;
        $param4 = $username;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function deleteUser($username)
    {
        $pstm = $this->connection->prepare("delete from user where username= ?");
        $pstm->bind_param("s",$param1);
        $param1 = $username;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }
}