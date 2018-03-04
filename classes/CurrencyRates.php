<?php

/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 24-2-2018
 * Time: 20:05
 */

class CurrencyRates
{

    private $clientSoap=null;

    function getCurrency(){
        //startupcto.com
        $this->clientSoap=new SoapClient('http://currencyconverter.kowabunga.net/converter.asmx?wsdl',array('trace'=>true));
        $currencies=$this->clientSoap->GetCurrencies();
        return $currencies->GetCurrenciesResult;
    }

    function convertCurrency($currencyFrom,$currencyTo,$amount){
        $this->clientSoap=new SoapClient('http://currencyconverter.kowabunga.net/converter.asmx?wsdl',array('trace'=>true));
        $params = array('CurrencyFrom'=>$currencyFrom,'CurrencyTo'=>$currencyTo,'RateDate'=>date('Y-m-d'),'Amount'=>$amount);
        $convert=$this->clientSoap->__soapCall('GetConversionAmount', array($params));
        return $convert->GetConversionAmountResult;
    }
}