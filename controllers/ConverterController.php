<?php
/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 18-2-2018
 * Time: 21:47
 */
require_once "../classes/CurrencyRates.php";
//action=>convert
session_start();
    if(isset($_GET['action'])) $action=$_GET['action'];
    if($action!=null){
        switch ($action){
            case 'convert':
                        if(isset($_POST['curencyFrom'])) $curencyFrom=$_POST['curencyFrom'];
                        if(isset($_POST['curencyTo'])) $curencyTo=$_POST['curencyTo'];
                        if(isset($_POST['numberFrom'])) $numberFrom=$_POST['numberFrom'];
                        if(isset($_POST['numberFrom'])) $numberFrom=$_POST['numberFrom'];
                        if(isset($_POST['button'])) $button=$_POST['button'];
                         $currency= new CurrencyRates();
                         $currencies=(array)$currency->getCurrency();
                         if($button == 'right'){
                             $convertRight = $currency->convertCurrency($curencyFrom,$curencyTo,$numberFrom);
                             $convertLeft = $currency->convertCurrency($curencyTo,$curencyFrom,$numberFrom);
                             $convert = $convertRight;
                         }
                         if($button == 'left'){
                            $convertLeft = $currency->convertCurrency($curencyTo,$curencyFrom,$numberFrom);
                            $convertRight = $currency->convertCurrency($curencyFrom,$curencyTo,$numberFrom);
                            $convert = $convertLeft;
                         }
                        include '../views/currencyConverter.php';
                        break;

            default: header('Location:index.php');
        }

    }