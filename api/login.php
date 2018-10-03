<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 11:16 AM
 */
require_once __DIR__."/business/impl/Login_BOImpl.php";
header("Content-type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$loginBO = new Login_BOImpl();
switch ($method){
    case "POST":
        $action = $_POST["action"];
        switch ($action){
            case "login":
                $username = $_POST["username"];
                $password = $_POST["password"];
                echo json_encode($loginBO->authenticate($username,$password));
                break;
        }
        break;
}
