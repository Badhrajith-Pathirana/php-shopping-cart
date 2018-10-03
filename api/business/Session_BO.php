<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 9:39 AM
 */

interface Session_BO
{
    public function getCartSession();
    public function setCartSession($itemid,$Qty);
    public function checkLogin();
    public function setLogin($username,$acctype);
    public function deleteCartItem($itemid);
}