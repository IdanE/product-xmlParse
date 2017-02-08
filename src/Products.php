<?php

namespace Idane\ProductParser;
class Products
{
    private $chain;
    private $store;
    public $products;

    /**
     * @return Chain
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param Chain $chain
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
    }

    /**
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param Store $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }


}