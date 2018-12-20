<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MÉDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>EDITAR MÉDICO</h2>
						<input type="hidden" name="id" value="<?php echo $medico['idMedico'];?>" />
						
						<input required type="numeric" name="identificacion" placeholder="Identidad:" value="<?php echo $medico['medidentificacion'];?>"
						minlength="13" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">

						<input type="text" name="nombres" placeholder="Nombres:" value="<?php echo $medico['mednombres'];?>"
						minlength="2" maxlength="50" required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">

						<input type="text" name="apellidos" placeholder="Apellidos:"   value="<?php echo $medico['medapellidos'];?>"
						minlength="2" maxlength="50" required pattern="[A-Za-z A-Za-z]{2,50}" autocomplete="off">
						
						<input required type="email" name="correo" placeholder="Correo:" value="<?php echo $medico['medcorreo'];?>">

						<input required type="numeric" name="telefono" placeholder="Telefono:" value="<?php echo $medico['medtelefono'];?>"
						minlength="13" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">

						<select name="especialidad">
							<option value="<?php echo $medico['medEspecialidad'];?>"><?php echo $medico['medEspecialidad'];?></option>
						</select>
						

						<input type="submit" name="enviar" value="Actualizar">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
                    <a class="btn-regresar" href="medicos.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>