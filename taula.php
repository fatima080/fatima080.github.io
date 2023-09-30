<?php
 session_start();
 
			 if (isset($_POST['databases'])) {
               $_SESSION['databases']=$_POST['databases'];
            }
             
        
			 
?>

<html>
	<head>
		<title>taula</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
	    <div class="container mt-3"><center><br>
		<div class="bg-info p-5">
		<h3>SELECCIÓ TAULA</h3><br><br>
			<form action="descarrega.php" method="POST" name="tables">
			<label for="sel1" class="form-label">Escull la taula adequada :D</label>
              <select class="form-select" id="tables" name="tables">
              
           <?php
		  
              $enlace = mysqli_connect( $_SESSION['IP'], $_SESSION['Usuari'], $_SESSION['Contrasenya'], $_SESSION['databases']);
			
              if (!$enlace) {
              echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
              echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
              echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
              exit;
            }
		
			$consulta = "SHOW TABLES";
			$sql=mysqli_query($enlace, $consulta);
			
            while ($row = mysqli_fetch_row($sql)){
	
							echo "<option>".$row[0]."</option>";
							
					}
      
           
			
            mysqli_close($enlace);
            
   
    ?>
	        </select>
              <br><br>
			  <input type="submit" value="Seleccionar" class="btn btn-success">
			</form>
			<form action="inici.html">
				<input type="submit" value="Desconnectar" class="btn btn-danger">
			</form>
			<form action="basedades.php">
				<input type="submit" value="SeleccionarBD" class="btn btn-danger">
			</form>
			</div>
	      </div>    
	</body>
</html>