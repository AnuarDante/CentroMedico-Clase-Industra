<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PACIENTES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>EDITAR PACIENTE</h2>
						<input type="hidden" name="id" value="<?php echo $paciente['idPaciente'];?>" />
						
						<input required type="numeric" name="identificacion" placeholder="Identidad:" value="<?php echo $paciente['pacIdentificacion'];?>"
						minlength="13" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">

						<input type="text" name="nombres" placeholder="Nombres:" value="<?php echo $paciente['pacNombre'];?>"
						minlength="2" maxlength="50" required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">

						<input type="text" name="apellidos" placeholder="Apellidos:"   value="<?php echo $paciente['pacApellidos'];?>"
						minlength="2" maxlength="50" required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">
						
						<input required type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:" value="<?php echo $paciente['pacFechaNacimiento'];?>">

						<select name="sexo">
						</select>
						<input type="submit" name="enviar" value="Actualizar">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
                    <a class="btn-regresar" href="pacientes.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>