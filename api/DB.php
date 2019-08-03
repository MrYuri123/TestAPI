<?php
namespace api;

use Config;

include_once "Config.php";

class DB
{
	private static $_instance = null;

	private function __construct () {

        try {
			$this->_instance = new \PDO(
				'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
		    	Config::DB_USER,
		    	Config::DB_PASS
		    );
		} catch (\PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
	{
		if (self::$_instance != null) {
			return self::$_instance;
		}

		return new self;
	}

    public function query($params)
	{
		return $this->_instance->query($params);
	}
}
