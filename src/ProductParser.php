<?php
namespace Idane;
require_once '../vendor/autoload.php';
require_once('ProductInterface.php');

use Sabre\Xml;

class ProductParser implements ProductParserInterface
{
    private $service;
    private $xml;

    public function __construct($xml, Xml\Service $service)
    {

        $this->service = $service;
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
            '{}'.static::PRODUCT_CONTAINER => function(Xml\Reader $reader){
                return Xml\Deserializer\repeatingElements($reader,'{}'.static::PRODUCT_ALIAS);
            },
        ];
        return $this->service->parse($this->xml);
    }
}

