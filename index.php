<?php

require __DIR__ . "/vendor/autoload.php";

use Apiki\Router;
use Apiki\ConvertValues;
header('Content-Type: application/json');
$router = new Router;
$url = $router->getExchangeEndPoint();

if($url && sizeof($url) === 5){
    try{
        $convertValue = new ConvertValues((float)$url[1], $url[2], $url[3], (float)$url[4]);

        if ($convertValue->currencyValidation() !== "Parâmetro Válido")
            throw new Exception($convertValue->currencyValidation());

        $convertedValue = $convertValue->getConvertedValue();
        $convertedValueIcon = $convertValue->getCurrencyIcon();

        $response = array("valorConvertido" => $convertedValue, "simboloMoeda" => $convertedValueIcon);
        http_response_code(200);
        echo  json_encode($response);

    }catch (Exception $exception)
    {
        http_response_code(404);
        echo $exception->getMessage();
    }

}