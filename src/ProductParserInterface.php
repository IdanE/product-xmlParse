<?php
namespace Idane\ProductParser;

interface ProductParserInterface
{
    const ROOT_ALIAS = 'root';
    const PRODUCT_ALIAS = null;
    const PRODUCTS_ALIAS = null;
    const CHAINID_ALIAS = null;
    const STOREID_ALIAS = null;
    /**
     * @return array[]
     */
    public function parse();
}