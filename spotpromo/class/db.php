<?php

namespace SPOT_PROMO;

trait db{
	public function dbResults($sql){
		try
		{
			$connection = $this->connection();
			$page=$connection->prepare($sql);
			$page->execute();
			return $page->fetchAll(\PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function dbResultsObject($sql){
		try
		{
			$connection = $this->connection();
			$page=$connection->prepare($sql);
			$page->execute();
			
			$a = $page->fetchAll(\PDO::FETCH_ASSOC);
			$b = json_encode($a);
			$c = json_decode($b);
			return $c;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function dbExec($sql){		
		$connection = $this->connection();;
		try {
			$page=$connection->prepare($sql);
			return $page->execute();	
		}
		catch (PDOException $e){
			return $e->getMessage();
		}
	}
	public function connection(){
		$host = "localhost";
		$user = "root";
		$password = "";
		$db_name = 'db_spotpromo';

		try
		{
		    $connection = new \PDO("mysql:host=$host;dbname=$db_name;charset=utf8;", $user, $password);
		    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $connection;    
		}
		catch (PDOException $e)
		{
		    echo 'Connection failed: ' . $e->getMessage();
		}
	}
}
?>