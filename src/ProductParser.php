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
        echo "chainId: {$this->chainId} | storeId: {$this->storeId}";


    }
    public function parse()
    {
        $className = Constants::CHAINS[$this->chainId]['class'];
        $parser = new $className($this->xml);
        return $parser->parse($this->xml);

    }
}

