<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CONSULTORIOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR CONSULTORIOS</h2><br/>
                        <input type="hidden" name="id" value="<?php echo $consultorio['idConsultorio'];?>">
                        <input required type="text" name="nombre" placeholder="Nombre de consultorio" value="<?php echo $consultorio['conNombre'];?>" autofocus
                        maxlength="50" minlength="2" autocomplete="off"/>
                        <input type="submit" value="Editar Consultorio" />
                        <?php  if(!empty($errores)): ?>
                          <ul>
                              <?php echo $errores; ?>
                          </ul>
                        <?php  endif; ?>
                     </form>
                    <a class="btn-regresar" href="consultorios.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>