<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 10:52 AM
 */
require_once __DIR__."/business/impl/Session_BOImpl.php";
header("Content-type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$sessionBO = new Session_BOImpl();
switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "authentication":
                echo json_encode($sessionBO->checkLogin());
                break;
        }
        break;
}