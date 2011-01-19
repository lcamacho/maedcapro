<?php
include 'autoload.php';
function isValid()
{
	//Verifico que sea una cedula de identidad
	if(!eregi("(^[1-9]{1}[0-9]{4,8})$", $_POST['q'])) {
		return false;
  }
  return true;
}

if (isValid()) {
	$persona = Persona::getByCi($_POST['q']);
}
include 'views/search.php';