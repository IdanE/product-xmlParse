<?php
use PHPUnit\Framework\TestCase;
class VictoryTest extends TestCase
{
    public function testParse()
    {
        $xml = <<<BLA
<?xml version="1.0" encoding="utf-8"?>
<Prices>
  <ChainID>7290696200003</ChainID>
  <SubChainID>001</SubChainID>
  <StoreID>065</StoreID>
  <BikoretNo>000</BikoretNo>
  <Products>
    <Product>
      <PriceUpdateDate>2017/02/06 07:33</PriceUpdateDate>
      <ItemCode>2057</ItemCode>
      <ItemType>0</ItemType>
      <ItemName>בדיקה</ItemName>
      <ManufactureName>עידן</ManufactureName>
      <ManufactureCountry />
      <ManufactureItemDescription />
      <UnitQty>יח`</UnitQty>
      <Quantity>1</Quantity>
      <UnitMeasure />
      <BisWeighted>0</BisWeighted>
      <QtyInPackage>1</QtyInPackage>
      <ItemPrice>50</ItemPrice>
      <UnitOfMeasurePrice>50</UnitOfMeasurePrice>
      <AllowDiscount>0</AllowDiscount>
      <itemStatus>1</itemStatus>
      <LastUpdateDate />
      <LastUpdateTime />
    </Product>
  </Products>
</Prices>
BLA;
        $testParser = new Idane\ProductParser\Parsers\Victory($xml);
        $result = $testParser->parse();
        $expected = unserialize('a:5:{s:7:"ChainID";s:13:"7290696200003";s:10:"SubChainID";s:3:"001";s:7:"StoreID";s:3:"065";s:9:"BikoretNo";s:3:"000";s:8:"Products";a:1:{i:0;a:18:{s:15:"PriceUpdateDate";s:16:"2017/02/06 07:33";s:8:"ItemCode";s:4:"2057";s:8:"ItemType";s:1:"0";s:8:"ItemName";s:10:"בדיקה";s:15:"ManufactureName";s:8:"עידן";s:18:"ManufactureCountry";N;s:26:"ManufactureItemDescription";N;s:7:"UnitQty";s:5:"יח`";s:8:"Quantity";s:1:"1";s:11:"UnitMeasure";N;s:11:"BisWeighted";s:1:"0";s:12:"QtyInPackage";s:1:"1";s:9:"ItemPrice";s:2:"50";s:18:"UnitOfMeasurePrice";s:2:"50";s:13:"AllowDiscount";s:1:"0";s:10:"itemStatus";s:1:"1";s:14:"LastUpdateDate";N;s:14:"LastUpdateTime";N;}}}');

        $this->assertEquals($expected,$result);
    }
}