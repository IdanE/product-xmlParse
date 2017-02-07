<?php
use PHPUnit\Framework\TestCase;
class ShufersalTest extends TestCase
{
    public function testParse()
    {
        $xml = <<<BLA
<?xml version="1.0" encoding="utf-8"?>
<root>
  <ChainId>7290027600007</ChainId>
  <SubChainId>001</SubChainId>
  <StoreId>001</StoreId>
  <BikoretNo>9</BikoretNo>
  <DllVerNo>8.0.1.3</DllVerNo>
  <Items Count="10">
    <Item>
      <PriceUpdateDate>2017-02-06 12:28</PriceUpdateDate>
      <ItemCode>7290000055521</ItemCode>
      <ItemType>0</ItemType>
      <ItemName>בדיקה</ItemName>
      <ManufacturerName>עידן</ManufacturerName>
      <ManufactureCountry>IL</ManufactureCountry>
      <ManufacturerItemDescription>בדיקה</ManufacturerItemDescription>
      <UnitQty>קילוגרמים</UnitQty>
      <Quantity>0.00</Quantity>
      <bIsWeighted>1</bIsWeighted>
      <UnitOfMeasure>ק"ג</UnitOfMeasure>
      <QtyInPackage>0</QtyInPackage>
      <ItemPrice>50.00</ItemPrice>
      <UnitOfMeasurePrice>50.00</UnitOfMeasurePrice>
      <AllowDiscount>1</AllowDiscount>
      <ItemStatus>1</ItemStatus>
    </Item>
  </Items>
</root>
BLA;


        $expected = unserialize('a:6:{s:7:"ChainId";s:13:"7290027600007";s:10:"SubChainId";s:3:"001";s:7:"StoreId";s:3:"001";s:9:"BikoretNo";s:1:"9";s:8:"DllVerNo";s:7:"8.0.1.3";s:5:"Items";a:1:{i:0;a:16:{s:15:"PriceUpdateDate";s:16:"2017-02-06 12:28";s:8:"ItemCode";s:13:"7290000055521";s:8:"ItemType";s:1:"0";s:8:"ItemName";s:10:"בדיקה";s:16:"ManufacturerName";s:8:"עידן";s:18:"ManufactureCountry";s:2:"IL";s:27:"ManufacturerItemDescription";s:10:"בדיקה";s:7:"UnitQty";s:18:"קילוגרמים";s:8:"Quantity";s:4:"0.00";s:11:"bIsWeighted";s:1:"1";s:13:"UnitOfMeasure";s:5:"ק"ג";s:12:"QtyInPackage";s:1:"0";s:9:"ItemPrice";s:5:"50.00";s:18:"UnitOfMeasurePrice";s:5:"50.00";s:13:"AllowDiscount";s:1:"1";s:10:"ItemStatus";s:1:"1";}}}');

        $testParser = new Idane\ProductParser\Parsers\Shufersal($xml);
        $result = $testParser->parse();
        $this->assertEquals($expected,$result);
    }
}