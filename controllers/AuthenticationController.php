<?php
/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 24-2-2018
 * Time: 18:08
 */
require_once "../models/Authentication.php";
require_once "../classes/CurrencyRates.php";
session_start();
    if(isset($_GET['action'])) $action=$_GET['action'];
    if($action!=null){
        switch ($action){
            case 'login':$aut=new Authentication();
                $user=null;
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $username=$_POST['username'];

                $password=$_POST['password'];
                    $user=$aut->login($username,$password);}
                    if($user !=null) {
                        $_SESSION['isauth']=1;
                        header("location: /currencyConverter/controllers/AuthenticationController.php?action=isauth");
                    }
                    else{
                        $error = 'your inlog gegeven klopt niet';
                        include '../views/layout.php';
                    }
                    break;
            case 'isauth':
                $currency = new CurrencyRates();
                $currencies = (array)$currency->getCurrency();

                include '../views/currencyConverter.php';
                break;
            case 'deconn':
                session_destroy();
                header("location:/currencyConverter/controllers/AuthenticationController.php?action=login");
                break;
            default: header('Location:index.php');
        }

    }




