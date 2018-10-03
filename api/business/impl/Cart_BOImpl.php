<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 10:11 AM
 */
require_once __DIR__."/../Cart_BO.php";
require_once __DIR__."/Session_BOImpl.php";
require_once __DIR__."/Item_BOImpl.php";
class Cart_BOImpl implements Cart_BO
{

    private $sessionBO;
    private $itemBO;
    public function __construct()
    {
        $this->sessionBO = new Session_BOImpl();
        $this->itemBO = new Item_BOImpl();
    }

    public function getCartData()
    {
        $cartDataRow = null;
        $i = 0;
        $result = $this->sessionBO->getCartSession();
        if($result === -1 || $result === 0){
            return $result;
        }
        foreach ($result as $val){

            $itmData = $this->itemBO->getItem($val["ItemID"]);
            $cartDataRow[$i]["ItemDet"] = $itmData;
            $cartDataRow[$i]["Qty"] = $val["Qty"];
            $i++;
        }
        return $cartDataRow;
    }

    public function saveCartData($itemid,$qty)
    {
        $result = $this->sessionBO->setCartSession($itemid,$qty);
        return $result;
    }

    public function deleteCart($itemID)
    {
        $result = $this->sessionBO->deleteCartItem($itemID);
        return $result;
    }
}