<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
//SELECT PARA MEDICOS
$medicos = $conexion -> prepare("SELECT * FROM medicos");

$medicos ->execute();
$medicos = $medicos ->fetchAll();
if(!$medicos)
	$mensaje .= 'No hay médicos. Registre un médico. <br />';
//SELECT PARA CONSULTORIOS
$consultorios = $conexion -> prepare("SELECT * FROM consultorios");

$consultorios ->execute();
$consultorios = $consultorios ->fetchAll();
if(!$consultorios)
	$mensaje .= 'No hay consultorios. Registre un consultorio. <br />';
//SELECT PARA PACIENTES
$pacientes = $conexion -> prepare("SELECT * FROM pacientes");

$pacientes ->execute();
$pacientes = $pacientes ->fetchAll();
if(!$pacientes)
	$mensaje .= 'No hay pacientes. Registre un paciente. <br />';

?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CITAS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
						<h2>Agregar Citas</h2>
						<label>Fecha:</label>
                        <input type="date" name="fecha" placeholder="Fecha:" required/>
                        <label>Hora:</label>
                        <input type="time" name="hora" value="11:45" max="20:30" min="08:00" step="60" required>
                        <label>Paciente:</label>
                        <select name="paciente" id="paciente" class="mayusculas" required> 
	                        <?php foreach ($pacientes as $Sql2): ?>
							<?php echo '<option value="'.$Sql2['idPaciente'].'">'.$Sql2['pacNombre'].' '.$Sql2['pacApellidos'].'</option>' ?>
							<?php endforeach; ?>
                        </select>
                        <label>Médicos:</label>
                        <select name="medico" id="medico" class="mayusculas" required> 
	                        <?php foreach ($medicos as $Sql): ?>
							<?php echo "<option value='". $Sql['idMedico']. "'>". $Sql['mednombres']." ". $Sql['medapellidos']. "</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Consultorios:</label>
                        <select name="consultorio" class="mayusculas" required> 
	                        <?php foreach ($consultorios as $Sql2): ?>
							<?php echo "<option value='". $Sql2['conNombre']. "'>". $Sql2['conNombre']."</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Estado:</label required>
                        <select name="estado">
                        	<option value="asignado">Asignado</option>
                        	<option value="atendido">Atendido</option>                    	
                        </select>
                        <label>Observaciones:</label>
                        <textarea required placeholder="Observación:" name="observaciones"></textarea>
						<input type="submit" name="enviar" value="Agregar Cita">
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