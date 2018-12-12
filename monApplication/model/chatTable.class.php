<?php


class chatTable{

	public function getChats(){
		
		$connection = new dbconnection();
		$sql = "select * from fredouil.chat ";
		$res = $connection->doQuery($sql, "chat");
		if($res === false){
			return false;
		}
		else{
			return $res;
		}

	
	}

	public function getLastChat()
	{
		$connection = new dbconnection();
		$sql = "select post from fredouil.chat order by post.date  limit 1";
		$res = $connection->doQuery($sql);
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
		
	}
}
