<?php include_once("common/cabecera.php"); ?>

<body>
	<?php include_once("common/menu.php"); ?>


	<form action="index.php">

		<input type="hidden" name="controlador" value="equipo">
		<input type="hidden" name="accion" value="nuevo">

		<?php echo isset($errores["item"]) ? "*" : "" ?>
		<label for="equipo">Equipo</label>
		<input type="text" name="equipo" maxlength="10">
		</br>
		<input type="submit" name="submit" value="Aceptar">
	</form>
	<form action="index.php">
		<input type="hidden" name="controlador" value="Equipo">
		<input type="hidden" name="accion" value="listar">
		<input type="submit" name="cancel" value="Cancelar">
	</form>
	</br>
	<?php
	if (isset($errores)):
		foreach ($errores as $key => $error):
			echo $error . "</br>";
		endforeach;
	endif;
	?>

	<?php include_once("common/pie.php"); ?>
</body>

</html>