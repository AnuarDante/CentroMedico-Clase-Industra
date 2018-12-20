<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

//CARGAR ESPECIALIDADES EN EL SELECT
$especialidad = $conexion -> prepare("SELECT * FROM especialidades");

$especialidad ->execute();
$especialidad = $especialidad ->fetchAll();
if(!$especialidad)
	$mensaje .= 'NO hay especialidades, por favor registre!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medicos - CenterMedicine</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MÉDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Médico</h2>
						<input required type="numeric" name="identificacion" placeholder="Número de identidad:" autocomplete="off"
						minlength="13" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
						
						<input type="text" name="nombres" placeholder="Nombres:" minlength="2" maxlength="50"
						required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">
						
						<input required type="text" name="apellidos" placeholder="Apellidos:" minlength="2" maxlength="50"
						required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">
						
						<input required type="email" name="correo" placeholder="Correo:" autocomplete="off">
						
						<input required type="numeric" name="telefono" placeholder="Teléfono:" minlegth="8" maxlength="8" 
						onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">
						
						<select name="especialidad">
						<option value="" disabled selected>Selecciona una especialidad</option>
                        <?php foreach ($especialidad as $Sql): ?>
						<?php echo "<option value='". $Sql['espNombre']. "'>". $Sql['espNombre']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						<input type="submit" name="enviar" value="Agregar Médico">
						
					</form>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>