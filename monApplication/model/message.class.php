<?php

class message extends basemodel
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
	/*
	public static function getPost($id)
  {
    $connection = new dbconnection() ;
    
    $sql = "select * from fredouil.post where id='".$id."'" ;
    $res = $connection->doQueryObject( $sql , "post" );
    
    if($res === false)
      return false ;
    return $res ;
  }*/
		
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
