<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/7/18
 * Time: 11:18 AM
 */

interface Login_BO
{
    public function authenticate($username, $password);
}