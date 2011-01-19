<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Proyecto</title>
</head>
<body>
	<?php include 'menu.php';?>
	<table>
		<thead>
			<tr>
				<th>
					Cédula
				</th>
				<th>
					Nombre
				</th>
				<th>
					Teléfono
				</th>
				<th>
					Email
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($personas as $persona):?>
				<tr>
					<td>
						<?php echo $persona->getCi() ?>
					</td>
					<td>
						<?php echo $persona->getName() ?>
					</td>
					<td>
						<?php echo $persona->getPhone() ?>
					</td>
					<td>
						<?php echo $persona->getEmail() ?>
					</td>
					<td>
						<a href="edit.php?ci=<?php echo $persona->getCi()?>">Editar</a>
					</td>
					<td>
						<a href="delete.php?ci=<?php echo $persona->getCi()?>">Eliminar</a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
</html>