<?php

/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 18-2-2018
 * Time: 21:14
 */
require_once "../classes/Config.php";
class Authentication
{
    public $config=null;

    private $queryCount='select username  from users WHERE username=? and password=?';

    function login($username,$password){
       $this->config=Config::getInstance();
       $statement=$this->config->getPdo()->prepare($this->queryCount);
       $statement->execute(array($username,$password));
       $count= $statement->rowCount();
       if($count>0) return $username;
       return null;

    }

}