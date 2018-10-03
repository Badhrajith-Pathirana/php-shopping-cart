<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 10:31 PM
 */
require_once __DIR__."/../Cookie_BO.php";
require_once __DIR__."/Item_BOImpl.php";

class Cookie_BOImpl implements Cookie_BO
{
    private $itemBo;
    public function __construct()
    {
        $this->itemBo = new Item_BOImpl();
    }

    public function getCartCookie()
    {
        $cookiedet= null;
        $i=0;
        foreach ($_COOKIE["cart"] as $value){
            $result = $this->itemBo->getItem($value["ItemID"]);
            $cookiedet[$i]["ItemPic"] = $result["ItemPic"];
            $cookiedet[$i]["ItemTitle"] = $result["ItemTitle"];
            $cookiedet[$i]["ItemPrice"] = $value["ItemPrice"];
            $cookiedet[$i]["Qty"] = $result["Qty"];
            $i++;
        }
        return $cookiedet;
    }


    public function saveCartCookie($itemid, $itemprice, $qty)
    {
        $cartArr = null;
        $cartArr["ItemID"] = $itemid;
        $cartArr["ItemPrice"] = $itemprice;
        $cartArr["Qty"] = $qty;
        if(!isset($_COOKIE["cart"])){
            setcookie("cart",$cartArr,time()+(60*60*24*7),"/");
            return true;
        }
        $cartCookie = $_COOKIE["cart"];
        $cartCookie[sizeof($cartCookie)] = $cartArr;
    }
}