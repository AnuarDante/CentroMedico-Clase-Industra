<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("SELECT c.idcita, c.citfecha, c.cithora, CONCAT(p.pacNombre, ' ', p.pacApellidos) AS paciente, 
		CONCAT(m.mednombres, ' ', m.medapellidos) AS medico, c.citConsultorio, c.citestado, c.citobservaciones  
		FROM citas c INNER JOIN pacientes p ON c.citPaciente = p.idPaciente 
		INNER JOIN medicos m ON c.citMedico = m.idMedico;");
$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY CITAS PARA MOSTRAR';
}

/*echo "$consulta['idcita']";*/

/*$nombre_paciente = $conexion -> prepare("SELECT pacNombre, pacApellidos FROM pacientes WHERE idPaciente = $consulta['citPaciente'] ");
$nombre_paciente->execute();
$nombre_paciente = $nombre_paciente ->fetchAll();*/

?>

<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CITAS</h2>
					</div>
					<a class="agregar" href="agregarcitas.php">Agregar Citas</a>
					<table class="tabla">
						  <tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Médico</th>
							<th>Consultorio</th>
							<th>Observaciones</th>
							<th>Estado</th>
							<th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td class='mayusculas'>". $Sql['idcita']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citfecha']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['cithora']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['paciente']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['medico']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citConsultorio']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citestado']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citobservaciones']. "</td>"; ?>
                        <?php echo "<td class='centrar'>"."<a href='actualizarcitas.php?idcita=".$Sql['idcita']."' class='editar'>Editar</a>". "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='eliminar_citas.php?idcita=".$Sql['idcita']."' class='eliminar'>Eliminar</a>". "</td>"; ?>
						</tr>
						<?php endforeach; ?>
						</table>
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