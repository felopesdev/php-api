<?php


namespace Apiki;



class ConvertValues
{

    private float $amount;
    private string $from;
    private  string $to;
    private float $rate;


    public function __construct(float $amount,  string $from, string $to,  float $rate)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
        $this->rate = $rate;
    }



    public function getRate(): float
    {
        return $this->rate;
    }


    public  function  currencyValidation(): string
    {
        if(!($this->from === "BRL" || $this->from === "USD" || $this->from === "EUR"))
            return "Parâmetro 'from' inválido";
        if(!($this->to === "BRL" || $this->to === "USD" || $this->to === "EUR"))
            return "Parâmetro 'to' inválido";
        return "Parâmetro Válido";
    }


    public function getConvertedValue(): float|int
    {
        return $this->amount *  $this->rate;
    }



    public function  getCurrencyIcon(): string
    {
        $symbols = array(
            "BRL" => "R$",
            "USD" => "$",
            "EUR" => "€"
        );
        return $symbols[$this->to];
    }

}