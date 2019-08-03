<?php
namespace api\users;

use api\DB;
use api\Errors;

/**
 * Work with GET "users" data
 */
class GetDatabaseData implements \api\interfaces\DatabaseDataInterface
{

	public function getData()
	{
		$dbh = DB::getInstance();
		//Finds user's info form database by ID;
		if (isset($_GET['id']) && !empty($_GET['id'])){

            foreach($dbh->query('SELECT * from users WHERE id="'.$_GET['id'].'"') as $row) {
                $result['id']          = $row['id'];
                $result['name']        = $row['name'];
                $result['second_name'] = $row['second_name'];
                $result['age']         = $row['age'];
            }

            if (is_null($result)){
				echo Errors::emptyResult();
                die();
            }
            return json_encode($result);
	    }
		echo Errors::emptyResult();
		die();
	}
}
