<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 11:19 AM
 */
require_once __DIR__."/Session_BOImpl.php";
require_once __DIR__."/../Login_BO.php";
require_once __DIR__."/../../db/DBConnection.php";
require_once __DIR__."/../../repository/impl/User_repositoryImpl.php";
class Login_BOImpl implements Login_BO
{
    private $userRepo;
    private $sessionBO;
    public function __construct()
    {
        $this->sessionBO = new Session_BOImpl();
        $this->userRepo = new User_repositoryImpl();
    }

    public function authenticate($username, $password)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userRepo->setConnection($connection);

        $result = $this->userRepo->getUser($username);
        if($result == null){
            return false;
        }
        $veer = password_verify($password,$result["password"]);
        if($veer){
            $this->sessionBO->setLogin($result["username"] , $result["admin"]);
            return true;
        }
        return false;
    }
}