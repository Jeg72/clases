<?php 
require("conexion.php");
//Condición que captura una variable que viene por post
if (isset($_POST["submit"])) {
	//Condición que captura una variable que viene por input FILE
	if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
		//La ruta donde se almacenan los archivos
		$ruta_destino = "../archivos/";
		//trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
		$nameFinal = trim($_FILES['fichero']['name']);
		//Reemplaza e espacio vacío por _
        $nameFinal= ereg_replace (" ", "_", $nameFinal);
		$uploadFile = $ruta_destino . $nameFinal;
		//Condición que mueve el archivo a su destino 
		if (move_uploaded_file($_FILES['fichero']['tmp_name'],$uploadFile)) {// se coloca en su lugar final 
			$nombreArchivo = $_POST["nombre_archivo"];
			//query para insertar los datos del archivo
			$query = "INSERT INTO archivos VALUES (0,'$nombreArchivo', '".$nameFinal."','".$_FILES['fichero']['type']."','".$_FILES['fichero']['size']."')";
			mysqli_query($conexion,$query) or die(mysqli_error());
			mysqli_close($conexion);
		}
	}
}
 ?>
 <form action="../subirArchivos.php" name="formulario" method="post">
 	<input type="hidden" name="nombre" value="<?php 
 	echo $nameFinal; ?>">
 	<input type="hidden" name="tipo" value="<?php 
 	echo $_FILES['fichero']['type']; ?>">
 	<input type="hidden" name="peso" value="<?php 
 	echo $_FILES['fichero']['size']; ?>">
 </form>
 <script type="text/javascript"> 
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>