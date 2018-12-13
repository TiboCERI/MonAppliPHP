<?php

class messageTable{


	public function getMessages()
	{
		$connection = new dbconnection();
		$sql = "select * from fredouil.message";
		$res = $connection->doQueryObject($sql, "message");
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}
	
	public function getMessagesSentTo($id)
	{
		$connection = new dbconnection();
		$sql = Tri($id,10);
		$res = $connection->doQueryObject($sql, "message");
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}
	
	
	public static function getMessagePostedBy($id)
	{
		$connection = new dbconnection();
		$sql = "select * from fredouil.message where emetteur='".$id."'";
		$res = $connection->doQuery($sql, "message");
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
	}
	


}
	
