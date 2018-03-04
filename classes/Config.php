<?php
/**
 * Created by IntelliJ IDEA.
 * User: Baddi
 * Date: 24-2-2018
 * Time: 18:05
 */
class Config
{
    private static $instanceConnection = null;
    private $_pdo;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=localhost;dbname=db_currencyConverter','root','');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if(!isset(self::$instanceConnection)) {
            self::$instanceConnection = new Config();
            self::$instanceConnection->_pdo->prepare('');
        }
        return self::$instanceConnection;
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

}