<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 5:48 AM
 */

interface Item_repository
{
    public function setConnection(mysqli $connection);
    public function getAll();
    public function getItem($itemid);
    public function saveItem($itemid,$itemTitle,$ItemPrice,$ItemPic,$stock);
    public function updateItem($itemid,$itemTitle,$ItemPrice,$ItemPic,$stock);
    public function deleteItem($itemid);
}