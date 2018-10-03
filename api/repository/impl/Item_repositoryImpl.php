<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 5:58 AM
 */
require_once __DIR__."/../Item_repository.php";
class Item_repositoryImpl implements Item_repository
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
        $resultSet = $this->connection->query("select * from item");
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    public function getItem($itemid)
    {
        $pstm = $this->connection->prepare("select * from item where ItemID = ?");
        $pstm->bind_param("s",$param1);
        $param1 = $itemid;
        $result = $pstm->execute();
        if($result){
            return $pstm->get_result()->fetch_assoc();
        }else{
            return null;
        }
    }

    public function saveItem($itemid, $itemTitle, $ItemPrice, $ItemPic, $stock)
    {
        $pstm = $this->connection->prepare("insert into item values(?,?,?,?,?)");
        $pstm->bind_param("ssdsi",$param1,$param2,$param3,$param4,$param5);
        $param1 = $itemid;
        $param2 = $itemTitle;
        $param3 = (double)$ItemPrice;
        $param4 =  $ItemPic;
        $param5 = (int) $stock;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function updateItem($itemid, $itemTitle, $ItemPrice, $ItemPic, $stock)
    {
        $pstm = $this->connection->prepare("update item set ItemTitle = ?, ItemPrice = ?, ItemPic = ?, stock=? where ItemID=? ");
        $pstm->bind_param("sdsis",$param2,$param3,$param4,$param5,$param1);
        $param1 = $itemid;
        $param2 = $itemTitle;
        $param3 = (double)$ItemPrice;
        $param4 =  $ItemPic;
        $param5 = (int) $stock;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }

    public function deleteItem($itemid)
    {
        $pstm = $this->connection->prepare("delete from item where ItemID = ?");
        $pstm->bind_param("s",$param1);
        $param1 = $itemid;
        $result = $pstm->execute();
        if($result){
            return $pstm->affected_rows;
        }else{
            return -1;
        }
    }
}