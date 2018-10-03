<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 10:41 AM
 */
require_once __DIR__."/../Order_Item_repository.php";
class Order_Item_repositoryImpl implements Order_Item_repository
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
        $resultSet = $this->connection->query("select * from order_item");
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderItem($orderid, $itemid)
    {
        $pstm = $this->connection->prepare("select * from order_item where orderID = ? and ItemID = ?");
        $pstm->bind_param("is",$param1, $param2);
        $param1 = $orderid;
        $param2 = $itemid;
        $pstm->execute();
        $resultSet = $pstm->get_result();
        return $resultSet->fetch_assoc();
    }

    public function getOrderedItems($orderid)
    {
        $pstm = $this->connection->prepare("select * from order_item where orderID = ?");
        $pstm->bind_param("i",$param1);
        $param1 = $orderid;
        $pstm->execute();
        $resultSet = $pstm->get_result();
        return  $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    public function saveOrderItem($orderid, $itemid, $price, $qty)
    {
        $pstm = $this->connection->prepare("insert into order_item values (?,?,?,?)");
        $pstm->bind_param("isdi",$param1, $param2,$param3,$param4);
        $param1 = (int) $orderid;
        $param2 = $itemid;
        $param3 = (double)$price;
        $param4 = (int) $qty;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function updateOrderItem($orderid, $itemid, $price, $qty)
    {
        $pstm = $this->connection->prepare("update order_item set price = ?,Qty = ? where orderID = ? and ItemID = ?");
        $pstm->bind_param("isdi",$param3, $param4,$param1,$param2);
        $param1 = (int) $orderid;
        $param2 = $itemid;
        $param3 = (double)$price;
        $param4 = (int) $qty;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function deleteOrderItem($orderid,$itemid)
    {
        $pstm = $this->connection->prepare("delete from order_item where orderID = ? and ItemID = ?");
        $pstm->bind_param("is",$param1,$param2);
        $param1 = (int)$orderid;
        $param2 = $itemid;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }
}