<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 9:20 AM
 */

interface Order_repository
{
    public function setConnection(mysqli $connection);
    public function getAll();
    public function getOrder($orderid);
    public function saveOrder($user, $date);
    public function updateOrder($orderid,$user, $date );
    public function deleteOrder($orderid);
}