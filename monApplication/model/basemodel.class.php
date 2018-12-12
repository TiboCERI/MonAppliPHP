<?php

abstract class basemodel
{
	private $data = array();
	
	public function __construct($data)
	{
		this->data[] = $data;
	}

	public function __get($att)
	{
		if( empty($att))
		{
			return NULL;
		}
		else
		{
			return this->data[$att];
		}
	}
	
	public function __set($att,$value)
	{
		this->data[$att]=$value;
	}	

 public function save()
  {
    $connection = new dbconnection() ;

    if($this->id)
    {
      $sql = "update ".get_class($this)." set " ;

      $set = array() ;
      foreach($this->data as $att => $value)
        if($att != 'id' && $value)
          $set[] = "$att = '".$value."'" ;

      $sql .= implode(",",$set) ;
      $sql .= " where id=".$this->id ;
    }
    else
    {
      $sql = "insert into ".get_class($this)." " ;
      $sql .= "(".implode(",",array_keys($this->data)).") " ;
      $sql .= "values ('".implode("','",array_values($this->data))."')" ;
    }

    $connection->doExec($sql) ;
    $id = $connection->getLastInsertId("fredouil.".get_class($this)) ;

    return $id == false ? NULL : $id ; 
  }

}
