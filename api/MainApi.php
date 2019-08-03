<?php
namespace api;

use api\users\Users;
use api\Errors;

/**
 * Main class. Parse request data.
 */
class MainApi
{
    public $result;
	public $method;

    function __construct($requestMethod)
    {
		$this->method = $requestMethod;
    }

	public function getResult($requestName)
	{
		//Initiate class from $requestName data.
		//Fabric pattern
		switch ($requestName) {
			case 'users':
				$users = new Users($this->method);
				return $users->parse();
				break;

			default:
				echo Errors::emptyResult();
				die();
		}
	}

//Check if we can trust to client's IP.
    public function checkAccess()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if (!in_array($ip, \Config::IP)){
            echo \api\Errors::accessDenied();
            die();
        }
    }
}
