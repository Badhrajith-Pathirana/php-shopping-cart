<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 10:10 AM
 */

interface Cart_BO
{
    public function getCartData();
    public function saveCartData($itemid,$qty);
    public function deleteCart($itemID);
}