<?php
namespace Idane\ProductParser;

class ProductParser
{
    private $filename;
    private $xml;
    public function parse($filename)
    {
        $this->filename = $filename;
        $this->xml = file_get_contents($this->filename);
        $result = preg_match("/Price(?:Full)?(?<chainId>[0-9]{13})-(:?[0-9]{3})/",$this->filename,$match);
        if(!$result)
        {
            throw new \Exception("Invalid XML file format!");
        }

        $chainId = $match['chainId'];
        $chains = Constants::CHAINS;
        if(!isset($chains[$chainId]))
        {
            throw new \Exception("Unrecognized Chain ID");
        }
        $className = Constants::CHAINS[$chainId]['class'];
        $chainName = $className::CHAIN_NAME;
        $parser = new $className($this->xml);
        $result = $parser->parse($this->xml);
        $trueChainId = $result[$className::CHAINID_ALIAS];
        if($trueChainId != $chainId){
            $chainId = $trueChainId;
        }

        $storeId = ltrim($result[$className::STOREID_ALIAS],'0');
        $storeName = null;
            if(isset($className::STORES[$storeId])){
                $storeName = $className::STORES[$storeId];
            }
        $products = new Products();
        $products->setChain(new Chain($chainId,$chainName));
        $products->setStore(new Store($storeId,$storeName));
        foreach($result[$className::PRODUCTS_ALIAS] as $entry)
        {
            $_product = new Product();
            $_product->setItemCode($entry['ItemCode']);
            $_product->setName($entry['ItemName']);
            $_product->setPrice(floatval($entry['ItemPrice']));
            $products->products[] = $_product;

        }
        return $products;

    }
}

