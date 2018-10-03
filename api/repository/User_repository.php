<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 12:16 AM
 */

interface User_repository
{
    public function setConnection(mysqli $connection);
    public function getUsers();
    public function getUser($username);
    public function saveUser($username,$name,$password,$photo);
    public function updateUser($username,$name,$password,$photo);
    public function deleteUser($username);

}