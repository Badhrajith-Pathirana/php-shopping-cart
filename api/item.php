<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 11:45 AM
 */
require_once __DIR__."/business/impl/Item_BOImpl.php";
$method = $_SERVER["REQUEST_METHOD"];
header("Content-type: application/json");
$itemBO = new Item_BOImpl();
switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "all":
                echo json_encode($itemBO->getAll());
                break;
            case "one":
                $itemid = $_GET["id"];
                echo json_encode($itemBO->getItem($itemid));
                break;
        }
        break;
}