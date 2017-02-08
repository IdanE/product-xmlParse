<?php
namespace Idane\ProductParser\Parsers;
use Idane\ProductParser\ProductXMLParser;

class Victory extends ProductXMLParser
{
    const ROOT_ALIAS = 'Prices';
    const PRODUCT_ALIAS = "Product";
    const PRODUCTS_ALIAS = "Products";
    const CHAINID_ALIAS = "ChainID";
    const STOREID_ALIAS = "StoreID";
}