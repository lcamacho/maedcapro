<?php
class DataBase
{
	//Nombre del usuario a conectarse a mysql
	protected $username = 'maedca';
	//Contraseña para conectarse a mysql
	protected $password = 'maedca';
	//Nombre de la base de datos
	protected $database = 'Proyectoe';
	//Nombre del host a conectarse
	protected $host = '127.0.0.1';
	
	function __construct()
	{
		
	}
	
	protected function openConnection()
	{
		$connection = mysql_connect($this->host, $this->username, $this->password) or die('No hay conexion con la base de datos');
  	$db = mysql_select_db($this->database) or die('No existe la base de datos');
  	return $connection;	
	}
	
	public static function getAll($class)
	{
		$db = new DataBase();
		$connection = $db->openConnection();
		$sql = 'SELECT * FROM '.$class;
		$result = mysql_query($sql,$connection);
		$objects = array();
		while($object = mysql_fetch_object($result,$class)) {
			array_push($objects, $object);
		}
		return $objects;
	}
	
	public static function save($properties,$values,$class)
	{
		$db = new DataBase();
		$connection = $db->openConnection();
		$sql = 'INSERT INTO '.$class.' ('.$properties.') VALUES ('.$values.')';
		$result = mysql_query($sql,$connection);
		if (!$result) {
			die('Ocurrio un problema al crear una nueva persona');
		}
	}
	
	public static function search($id,$class)
	{
		$db = new DataBase();
		$connection = $db->openConnection();
		$sql = 'SELECT * FROM '.$class.' WHERE ci = '.$id;
		$result = mysql_query($sql,$connection);
		return mysql_fetch_object($result,$class);
	}
	
	public static function delete($id,$class)
	{
		$db = new DataBase();
		$connection = $db->openConnection();
		$sql = 'DELETE FROM '.$class.' WHERE ci='.$id;
		$result = mysql_query($sql,$connection);
	}
	
	public static function update($ciorig)
	{
		
	}
}