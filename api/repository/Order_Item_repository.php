<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 10:02 AM
 */

interface Order_Item_repository
{
    public function setConnection(mysqli $connection);
    public function getAll();
    public function getOrderItem($orderid,$itemid);
    public function getOrderedItems($orderid);
    public function saveOrderItem($orderid,$itemid,$price,$qty);
    public function updateOrderItem($orderid,$itemid,$price,$qty);
    public function deleteOrderItem($orderid,$itemid);
}