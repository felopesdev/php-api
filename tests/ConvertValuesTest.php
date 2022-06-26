<?php


use Apiki\ConvertValues;
use PHPUnit\Framework\TestCase;

class ConvertValuesTest extends TestCase
{

    public function testCorrectFromAndToValues():void
    {
        $convertValue = new ConvertValues(10, "BRL", "EUR", 4.50);
        $this->assertEquals("Parâmetro Válido", $convertValue->currencyValidation());
    }


    public function testIncorrectFromValue():void
    {
        $convertValue = new ConvertValues(10, "Incorreto", "EUR", 4.50);
        $this->assertEquals("Parâmetro 'from' inválido", $convertValue->currencyValidation());
    }


    public function testIncorrectToValue():void
    {
        $convertValue = new ConvertValues(10, "BRL", "Incorreto", 4.50);
        $this->assertEquals("Parâmetro 'to' inválido", $convertValue->currencyValidation());
    }


    public function testConvertedCorrectValues():void
    {
        $convertValue = new ConvertValues(10, "BRL", "USD", 4.50);
        $this->assertEquals(true ,  $convertValue->getConvertedValue() === (float)45);
    }


    public function testConvertedIncorrectAmountValue():void
    {
        $convertValue = new ConvertValues((float)"dez", "BRL", "USD", 4.50);
        $this->assertEquals(false, $convertValue->getConvertedValue() > 0);
    }


    public function testConvertedIncorrectRateValue():void
    {
        $convertValue = new ConvertValues(10, "BRL", "USD", (float)"cinco");
         $this->assertEquals(false, $convertValue->getConvertedValue() > 0);
    }

}
