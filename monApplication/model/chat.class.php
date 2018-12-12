<?php


class chat{

	public function getPost($id)
	{
		
		$connection = new dbconnection();
		$sql = "select post from fredouil.chat where id='".$id."'";
		$res = $connection->doQuery($sql);
		if($res === false){
			return false;
		}
		else{
			return $res;
		}
		
	}

}
