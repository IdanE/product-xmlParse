<?php
namespace Idane\ProductParser;

use Sabre\Xml;

class ProductXMLParser implements ProductParserInterface
{
    private $service;
    private $xml;

    public function __construct($xml)
    {

        $this->service = new Xml\Service();
        $this->xml = $xml;
    }
    public function parse()
    {
        $this->service->elementMap = [
            static::ROOT_ALIAS => function(Xml\Reader $reader) {
                return Xml\Deserializer\keyValue($reader, '');
            },
            '{}'.static::PRODUCT_ALIAS => function(Xml\Reader $reader) {
                return Xml\Deserializer\keyValue($reader, '');
            },
            '{}'.static::PRODUCTS_ALIAS => function(Xml\Reader $reader){
                return Xml\Deserializer\repeatingElements($reader,'{}'.static::PRODUCT_ALIAS);
            },
        ];

        return $this->service->parse($this->xml);
    }
}

