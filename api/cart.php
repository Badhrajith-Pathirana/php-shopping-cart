<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 10:08 AM
 */
require_once __DIR__."/business/impl/Cart_BOImpl.php";
header("Content-type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$cartBO = new Cart_BOImpl();
switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "all":
                echo json_encode($cartBO->getCartData());
                break;
        }
        break;
    case "POST":
        $action = $_POST["action"];
        switch ($action){
            case "save":
                $itemid = $_POST["itemID"];
                $qty = $_POST["qty"];
                echo json_encode($cartBO->saveCartData($itemid,$qty));
                break;
        }
        break;
    case "DELETE":
        $queryStr = $_SERVER["QUERY_STRING"];
        $qArr = preg_split("/=/",$queryStr);
        if(count($qArr) !== 2){
            return false;
        }
        echo json_encode($cartBO->deleteCart($qArr[1]));
        break;
}
