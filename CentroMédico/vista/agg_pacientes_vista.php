<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PACIENTES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Paciente</h2>
						<input required type="numeric" name="identificacion" placeholder="Identidad:"
						minlength="13" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">

						<input type="text" name="nombres" placeholder="Nombres:" minlength="2" maxlength="50"
						required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">
						
						<input type="text" name="apellidos" placeholder="Apellidos:" minlength="2" maxlength="50"
						required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">

						<input required type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:">
						<select required name="sexo">
							<option value="" disabled selected>Seleccione un género</option>
                            <option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option> 
                        </select>
						<input type="submit" name="enviar" value="Agregar Paciente">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>