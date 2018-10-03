<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/5/18
 * Time: 11:33 PM
 */

class DBConnection
{
    private $connection;
    public function __construct()
    {
        $this->connection = new mysqli("localhost","root","","shopping_cart","3306");
        if($this->connection->connect_errno){
            die($this->connection->connect_error);
        }
    }
    public function getConnection(){
        return $this->connection;
    }
}