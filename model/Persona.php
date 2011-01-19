<?php
class Persona 
{
	protected $ci;
	protected $name;
	protected $phone;
	protected $email;
	
	function __construct()
	{
		
	}
	
	function __autoload($class)
	{
		include $class.'.php';
	}
	
	public function setCi($ci)
	{
		$this->ci = $ci;
	}
	
	public function getCi()
	{
		return $this->ci;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
	
	public function getPhone()
	{
		return $this->phone;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public static function getAll()
	{
		return DataBase::getAll(__CLASS__);
	}
	
	public function save()
	{
		$val = array();
		$prop = array();
		$propval = get_object_vars($this);
		foreach ($propval as $name => $value) {
			array_push($prop, $name);
			if ($name == 'email' || $name == 'name' || $name == 'phone') {
				$value = '"'.$value.'"';
			}
			array_push($val, $value);
		}
		$properties = implode(',', $prop);
		$values = implode(',', $val);
		DataBase::save($properties,$values, __CLASS__);
	}

	public static function delete($id)
	{
		DataBase::delete($id,__CLASS__);
	}
	
	public static function getByCi($ci)
	{
		return DataBase::search($ci, __CLASS__);
	}
	
	public static function update($ciorig)
	{
		$val = array();
		$prop = array();
		$propval = get_object_vars($this);
		foreach ($propval as $name => $value) {
			array_push($prop, $name);
			if ($name == 'email' || $name == 'name') {
				$value = '"'.$value.'"';
			}
			array_push($val, $value);
		}
		$properties = implode(',', $prop);
		$values = implode(',', $val);
		DataBase::update();
	}
}