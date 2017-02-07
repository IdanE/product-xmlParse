<?php

namespace Idane\ProductParser;
class Product
{
    private $chainId;
    private $chainName;
    private $storeId;
    private $name;
    private $price;
    /**
     * @return string
     */
    public function getChainId()
    {
        return $this->chainId;
    }

    /**
     * @param string $chainId
     */
    public function setChainId($chainId)
    {
        $this->chainId = $chainId;
    }

    /**
     * @return string
     */
    public function getChainName()
    {
        return $this->chainName;
    }

    /**
     * @param string $chainName
     */
    public function setChainName($chainName)
    {
        $this->chainName = $chainName;
    }

    /**
     * @return integer
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * @param integer $storeId
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}