<?php
include 'autoload.php';

function isValid()
{
	//Verifico que sea una cedula de identidad
	if (!eregi("(^[1-9]{1}[0-9]{5,8})$", trim($_POST['ci']))) {
			$_SESSION['e1'] = 'Debe colocar la cedula de identidad';
			return false;
  }
  //Verifico que sea nombre y apellido
	$nombre = trim($_POST['name']);
  if (str_word_count($nombre) >= 2){
  	$nombres = str_word_count($nombre,1);
  	$counter = 0;
  	foreach ($nombres as $number => $contenido) {
  		if (strlen($contenido) > 1) {
  			$counter++;
  		} 
  	}
  	if ($counter < 2) {
  		$_SESSION['e2'] = 'Debe colocar el nombre de la persona';
  		return false;
  	}
  }
  //Verifico que sea un numero de telefono valido
	if (!eregi("^([2|4]{1})([0-9]{9})$", trim($_POST['phone']))) {
		$_SESSION['e3'] = 'Debe colocar un numero de telefono valido';
		return false;
  }
  //Verifico que sea un correo valido
  if (!eregi("^[a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", trim($_POST['email']))) {
		$_SESSION['e4'] = 'Debe colocar el correo electronico valido';
		return false;
  }
  if (Persona::getByCi(trim($_POST['ci'])) != null) {
  	$_SESSION['e5'] = 'Ya existe otra persona con la misma cedula de identidad';
  	return false;
  }
  return true;
}

//Verifico que los datos que me envian son validos
if (isValid()) {
	$persona = new Persona();
	$persona->setCi(trim($_POST['ci']));
	$persona->setName(trim($_POST['name']));
	$persona->setPhone(trim($_POST['phone']));
	$persona->setEmail(trim($_POST['email']));
	$persona->save();
	$_POST = array();
	header('Location:index.php');
} else {
	include 'new.php';
}