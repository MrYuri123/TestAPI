<?php
namespace api\users;

use api\interfaces\ParseInterface;

/*
 * Parse methods for "users" request.
 * Now only "GET" method avaliable.
 */
class Users implements ParseInterface
{
	private $data;

    public function __construct($method)
	{
		//Initiate class from $method data.
		//Fabric pattern
		switch ($method) {
			case 'GET':
				$this->data = new GetDatabaseData();
				break;

			default:
			    echo \api\Errors::wrongRequest();
			    die();
		}
	}

	public function parse()
	{
		return $this->data->getData();
	}
}
