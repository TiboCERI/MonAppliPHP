<?php

class message
{
	public function getPost()
	{
		$connection = new dbconnection();
		$sql = "select post from fredouil.message";
		$res = $connection->doQuery($sql);
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}
	
	public function getParent()
	{
		$connection = new dbconnection();
		$sql = "select parent from fredouil.message";
		$res = $connection->doQuery($sql);
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}
	
		
	
	public function getLikes()
	{
		$connection = new dbconnection();
		$sql = "select count(aimer) from fredouil.message";
		$res = $connection->doQuery($sql);
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}

	
}
