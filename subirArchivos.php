<?php
 include("php/sesion.php"); 
include("head.php");
$namefinal= $_POST['nombre']; 
$tipo = $_POST['tipo']; 
$peso = $_POST['peso'];  
 ?>
<section id="contenedor">
	<section id="principal">
		  <article>
			    <center>                
              <fieldset id="archivo">
                   <form action="php/insertArchivos.php" method="post" enctype="multipart/form-data">
                        <label for="" class="cargar">
                           + Subir Archivo
                           <span>
                               <input type="file"  id="archivo" name="fichero">
                           </span> 
                        </label>
                           <br><br> 
                           <input type="text" name="nombre_archivo" class="input" placeholder="Nombre" required>
                           <input type="submit" name="submit" class="submit" value="Upload!">
                   </form>
                <?php 
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: ".$namefinal ."<br>";  
                    echo "Tipo MIME: <i>".$tipo."</i><br>";  
                    echo "Peso: <i>".$peso." bytes</i><br>";  
                    echo "<br><hr><br>"; 
                 ?>
                </fieldset>
                <img id="img" src="images/Cloud.jpg" alt="">
            </center>
		</article>
	</section>
	<aside>
	   <nav id="menu">
          <ul>
              <li><a href="index.php" id="enlaces" class="inicio">Inicio</a></li>
              <li><a href="subirArchivos.php" id="enlaces" class="inicio">Gargar archivo</a></li>
              <li><a href="listarArchivos.php" id="enlaces" class="inicio">Ver archivos</a></li>
              <li><a href="php/salir.php" id="enlaces" class="inicio">Salir</a></li>
          </ul>   
       </nav>
	</aside>
</section>
<?php 
include("footer.php");
 ?>