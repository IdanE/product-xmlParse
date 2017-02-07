<?php
namespace Idane\ProductParser;

class ProductParser
{
    private $filename;
    private $xml;
    private $chainId;
    private $storeId;
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->xml = file_get_contents($this->filename);
        $result = preg_match("/Price(?:Full)?(?<chainId>[0-9]{13})-(?P<storeId>[0-9]{3})/",$this->filename,$match);
        if(!$result)
        {
            throw new \Exception("Invalid XML file format!");
        }

        $this->chainId = $match['chainId'];
        $this->storeId = $match['storeId'];


    }
    public function parse()
    {
        $className = Constants::CHAINS[$this->chainId]['class'];
        $chainName = Constants::CHAINS[$this->chainId]['friendly_name'];
        $parser = new $className($this->xml);
        $result = $parser->parse($this->xml);
        $products = [];
        foreach($result[$className::PRODUCT_CONTAINER] as $entry)
        {
            $_product = new Product();
            $_product->storeId = $this->storeId;
            $_product->chainId = $this->chainId;
            $_product->chainName = $chainName;
            $_product->name = $entry['ItemName'];
            $_product->price = $entry['ItemPrice'];
            $products[] = $_product;

        }
        return $products;

    }
}

