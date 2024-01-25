<?php include_once("common/cabecera.php"); ?>

<body>
	<?php include_once("common/menu.php"); ?>

	<form action="index.php">

		<input type="hidden" name="controlador" value="equipo">
		<input type="hidden" name="accion" value="editar">

		<label for="equipo_id">Codigo</label>
		<input type="text" readonly name="equipo_id" value="<?php echo $equipo->getEquipoId(); ?>">
		</br>

		<?php echo isset($errores["equipo"]) ? "*" : "" ?>
		<label for="equipo">Equipo</label>
		<input type="text" name="equipo" maxlength="10" value="<?php echo $equipo->getEquipo(); ?>">
		</br>
		<input type="submit" name="submit" value="Aceptar">
	</form>
	<form action="index.php">
		<input type="hidden" name="controlador" value="equipo">
		<input type="hidden" name="accion" value="listar">
		<input type="submit" name="cancel" value="Cancelar">
	</form>
	</br>
	<?php
	if (isset($errores)) :
		foreach ($errores as $key => $error) :
			echo $error . "</br>";
		endforeach;
	endif;
	?>

	<?php include_once("common/pie.php"); ?>
</body>

</html>