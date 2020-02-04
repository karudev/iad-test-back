<?php
namespace App\Model;

/**
 * Class DB
 * @package App\Model
 */
class DB {

    protected static $instance;

    protected function __construct() {}

    /**
     * @return \PDO
     */
    public static function getInstance() {

        if(empty(self::$instance)) {

            include __DIR__.'/../../config/db.php';

            try {
                self::$instance = new \PDO("mysql:host=".$params['db_host'].';port='.$params['db_port'].';dbname='.$params['db_name'].';charset='.$params['db_charset'], $params['db_user'], $params['db_pass']);

            } catch(\PDOException $error) {
                echo $error->getMessage();
            }

        }

        return self::$instance;
    }
}