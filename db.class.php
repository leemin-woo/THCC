<?php

class Db
{
	protected static $connection;
	public function connect()
	{
		if(!isset(self::$connection))
		{
			$config=parse_ini_file("config.ini");
			self::$connection=new mysqli("localhost",$config["username"],$config["password"],$config["databasename"]);
		}
		if(self::$connection==false)
		{
			return false;
		}
		return self::$connection;
	}
	public function query_execute($querryString)
	{
		$connection=$this->connect();
		$result=$connection->query($querryString);
		$connection->close();
		return $result;

	}

	public function select_to_array($querryString)
	{
		$rows=array();
		$result=$this->query_execute($querryString);
		if ($result==false)
			return false;
		else
		{

			while ($item=$result->fetch_assoc())
			{
				$rows[]=$item;
			}
		}
		return $rows;
	}
}


?>
