<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Proyecto</title>
</head>
<body>
	<form action="create.php" method="post">
		<?php if (isset($_SESSION['e1'])) {
			echo '<div>',$_SESSION['e1'],'</div>';
		}?>
		<?php if (isset($_SESSION['e5'])) {
			echo '<div>',$_SESSION['e5'],'</div>';
		}?>
		<div>
			<label for="ci">C.I.:<input type="text" name="ci" value="<?php echo isset($persona)? $persona->getCi():''?>"/></label>
		</div>
		<?php if (isset($_SESSION['e2'])) {
			echo '<div>',$_SESSION['e2'],'</div>';
		}?>
		<div>
			<label for="name">Nombre:<input type="text" name="name" value="<?php echo isset($persona)? $persona->getName():''?>"/></label>
		</div>
		<?php if (isset($_SESSION['e3'])) {
			echo '<div>',$_SESSION['e3'],'</div>';
		}?>
		<div>
			<label for="phone">Teléfono:<input type="text" name="phone" value="<?php echo isset($persona)? $persona->getPhone():''?>"/></label>
		</div>
		<?php if (isset($_SESSION['e4'])) {
			echo '<div>',$_SESSION['e4'],'</div>';
		}?>
		<div>
			<label for="email">Correo:<input type="text" name="email" value="<?php echo isset($persona)? $persona->getEmail():''?>"/></label>
		</div>
		<?php if (isset($persona)):?>
			<input type="hidden" name="ciorig" value="<?php echo $persona->getCi()?>"/>
		<?php endif;?>
		<div>
			<input type="submit" value="Guardar"></input>
			<a href="index.php">Cancelar</a>
		</div>
	</form>
</body>
</html>