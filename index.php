


 <?php 
   include ('conexion.php');
  

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Comentarios</title>

	<style>
       #comentario{width:450px; height: auto;overflow: hidden;background: #000; color:#fff;}
       #comentario img{
       	float:left;
       	margin:10px;
       }

	</style>
</head>
<body>
	   <h1>Mural de comentarios</h1>
	   <hr>
	   <?php 
          $busca = mysql_query("SELECT * FROM comentarios  order by id desc LIMIT 4") or die (mysql_error());

          while($separar =mysql_fetch_array($busca)){
               $comentar_nombre =$separar['nombre'];
               $comentar_email =$separar['email'];
               $comentar_comentario =$separar['comentario'];
               $gravatar="http://www.gravatar.com/avatar/";
               $gravatar .= md5(strtolower(trim($comentar_email)));
               $gravatar .= "?d=mm";
               $email_comentar =$gravatar;
           ?>
              <div id="comentario">
               <img src="<?php echo $email_comentar;?>" alt="" title="<?php echo $comentar_nombre;?>">
             Nombre : <?php echo $comentar_nombre; ?> <br />
             Email : <?php echo $comentar_email; ?> <br />
             Comentario : <?php echo $comentar_comentario; ?> <br />
            
              </div>
            <?php
          }

	    ?>
	    <hr>
	   <br>
        <br>
        <?php 
             if (isset($_POST['accion'])&& isset($_POST['accion'])=='accion'){


          $nombre     = strip_tags(trim($_POST['nombre']));
          $email      = strip_tags(trim($_POST['email']));
          $comentario = strip_tags(trim($_POST['comentario']));
          $fecha =date('Y-m-d H:i');
          
             if(empty($nombre)){

             	echo "Presion en nombre";

             }elseif (empty($email)){
             	echo "presion email s";

             }elseif(empty($comentario)){
             	echo "Presione comentarios";
             }else{
           $mostrar = mysql_query("INSERT INTO comentarios (nombre,email,comentario,fecha) VALUES ('$nombre','$email','$comentario' ,'$fecha')")or die (mysql_error());
                      
                       if($mostrar == true){
                         echo '<script>alert("comentario enviado correctamente");top.location.href="index.php";</script>';

                       }else
                       echo "error al enviar";



             }


     
    }
         ?>
	 <form action="" method="POST" enctype="multipart/form-data">
	  Nombre:<br>
	  <input type="text" name="nombre"/><br>
	  Email:<br>
	  <input type="text" name="email"/><br>
	  Comentarios:<br>
	  <textarea name="comentario"></textarea>
	  <br>
	  <input type="submit" name="enviar" value="Enviar Comentario">
	  <input type="hidden" name="accion" value="accion">
		


	</form>
</body>
</html>