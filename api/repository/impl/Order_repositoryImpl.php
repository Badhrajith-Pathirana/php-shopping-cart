<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 9:38 AM
 */
require_once __DIR__."/../Order_repository.php";
class Order_repositoryImpl implements Order_repository
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

    public function getAll()
    {
        $resultSet = $this->connection->query("select * from order_");
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrder($orderid)
    {
        $pstm = $this->connection->prepare("select * from order_ where orderID = ?");
        $pstm->bind_param("i",$param1);
        $param1 = (int) $orderid;
        $pstm->execute();
        return $pstm->get_result()->fetch_assoc();
    }

    public function saveOrder($user, $date)
    {
        $pstm = $this->connection->prepare("insert into order_(user,date) values (?,?)");
        $pstm->bind_param("ss",$param1, $param2);
        $param1 = $user;
        $param2 = $date;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return-1;
        }
    }

    public function updateOrder($orderid, $user, $date)
    {
        $pstm = $this->connection->prepare("update order_ set user = ? , date = ? where orderID = ?");
        $pstm->bind_param("ssi",$param1,$param2,$param3);
        $param1 = $user;
        $param2 = $date;
        $param3 = $orderid;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return-1;
        }
    }

    public function deleteOrder($orderid)
    {
        $pstm = $this->connection->prepare("delete from order_ where orderID = ?");
        $pstm->bind_param("i",$param3);
        $param3 = $orderid;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return-1;
        }
    }
}