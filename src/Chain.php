<?php
namespace Idane\ProductParser;
class Chain
{
    private $chainId;
    private $chainName;

    function __construct($chainId, $chainName)
    {

        $this->chainId = $chainId;
        $this->chainName = $chainName;
    }
}