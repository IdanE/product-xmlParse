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

    /**
     * @return string
     */
    public function getChainId()
    {
        return $this->chainId;
    }
    /**
     * @return string
     */
    public function getChainName()
    {
        return $this->chainName;
    }


}