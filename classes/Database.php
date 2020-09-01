<?php

namespace Classes;

class Database {
    /**
     * 
     */
    private static $instance = null;

    /**
     * 
     */
    private function __construct() {
        // Singleton
    }

    /**
     * 
     */
    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }    

    /**
     * @return \mysqli
     * 
     */    
    public function connection() {
        $config = parse_ini_file('config.ini');
        return new \mysqli($config['db_host'], $config['db_username'], $config['db_password'], $config['db_database']);
    }
}
