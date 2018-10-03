<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 10:19 PM
 */

interface Cookie_BO
{
    public function getCartCookie();
    public function saveCartCookie($itemid,$itemprice,$qty);
}