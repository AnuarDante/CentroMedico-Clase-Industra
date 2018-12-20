<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>USUARIOS</h2>
					</div>
					<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
                            <h2>REGISTRAR USUARIO</h2><br/>
                            <input type="text" name="usuario"placeholder="Usuario" autofocus autocomplete="off"/>
                            <input type="password" name="password" placeholder="Contraseña" autocomplete="off"/>
                            <input type="password" name="password2" placeholder="Repita su contraseña" autocomplete="off"/>
                            <input type="text" name="nombres" placeholder="Nombres" autocomplete="off"/>
                            <input type="text" name="apellidos" placeholder="Apellidos" autocomplete="off"/>
                            <select name="roll">
                                <option value="admin">Admin</option>
                                <option value="Limitado">Limitado</option>
                            </select>
                            <input type="submit" value="Registrar" />
                            <?php  if(!empty($errores)): ?>
                              <ul>
                                  <?php echo $errores; ?>
                              </ul>
                            <?php  endif; ?>
                          </form>	
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>