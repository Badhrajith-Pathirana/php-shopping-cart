<?php
/**
 * Created by IntelliJ IDEA.
 * User: beempz
 * Date: 8/6/18
 * Time: 11:48 AM
 */
require_once __DIR__."/../Item_BO.php";
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__."/../../repository/impl/Item_repositoryImpl.php";
class Item_BOImpl implements Item_BO
{

    private $itemRepository;
    public function __construct()
    {
        $this->itemRepository = new Item_repositoryImpl();
    }

    public function getAll()
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);

        $result = $this->itemRepository->getAll();
        mysqli_close($connection);
        return $result;
    }

    public function getItem($itemid)
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);

        $result = $this->itemRepository->getItem($itemid);
        mysqli_close($connection);
        return $result;
    }
}