<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 9:41 AM
 */
require_once __DIR__."/../Session_BO.php";
class Session_BOImpl implements Session_BO
{

    public function getCartSession()
    {
        session_start();
//        $cartNew = null;
//        $i = 0;
        if(!isset($_SESSION["exists"])){
            session_unset();
            session_destroy();
            return -1;
        }
        if(!isset($_SESSION["cart"])){
            return 0;
        }
        $cartData = $_SESSION["cart"];
        /*foreach ($cartData as $value){
            $cartNew[$i]["ItemID"] = $value["ItemID"];
            $cartNew[$i]["Qty"] = $value["Qty"];
            $i++;
        }*/
        return $cartData;
    }

    public function setCartSession($itemid, $Qty)
    {
        ini_set("session.gc_maxlifetime",60*60*24*7);
        session_set_cookie_params(60*60*24*7);
        session_start();

        $cartData = null;
        $cartData["ItemID"] = $itemid;
        $cartData["Qty"] = $Qty;
        if(!isset($_SESSION["exists"])){
            return false;
        }
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = null;
        }
        $cartArr =  $_SESSION["cart"];
        $cartArr[sizeof($cartArr)] = $cartData;
        $_SESSION["cart"] = $cartArr;
        return true;
    }

    public function checkLogin()
    {
        ini_set("session.gc_maxlifetime",60*60*24*7);
        session_set_cookie_params(60*60*24*7);
        session_start();

        if(isset($_SESSION["exists"])){
            return true;
        }
        session_unset();
        session_destroy();
        return false;
    }

    public function setLogin($username, $acctype)
    {
        ini_set("session.gc_maxlifetime",60*60*24*7);
        session_set_cookie_params(60*60*24*7);
        session_start();

        $_SESSION["username"] = $username;
        $_SESSION["acc_type"] = $acctype;
        $_SESSION["exists"] = true;
    }

    public function deleteCartItem($itemid)
    {
        session_start();
        $cart = $_SESSION["cart"];
        $i = 0;
        foreach ($cart as $value){
            if($value["ItemID"] === $itemid){
                if(count($_SESSION["cart"]) === 1){
                    unset($_SESSION["cart"]);
                    return true;
                }
                unset($_SESSION["cart"][$i]);
                return true;
            }
            $i++;
        }
        return false;
    }
}