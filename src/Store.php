<?php
namespace Idane\ProductParser;
class Store
{
    private $storeId;
    private $storeName;

    function __construct($storeId, $storeName)
    {
        $this->storeId = $storeId;
        $this->storeName = $storeName;
    }
}