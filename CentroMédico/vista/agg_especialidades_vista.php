<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>ESPECIALIDADES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Especialidad</h2>
                        <input required type="text" name="nombre" placeholder="Especialidad:" minlength="2" maxlength="50" autocomplete="off"
                        pattern="[A-Za-z A-Za-z]{2,50}"/>
						<input type="submit" name="enviar" value="Agregar Especialidad">
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