<?php
    session_start();
	if (isset($_POST['databases'])) {
              $_SESSION['IP']=$_POST['IP'];
			  $_SESSION['Usuari']=$_POST['Usuari'];
			  $_SESSION['Contrasenya']=$_POST['Contrasenya'];
            }
              
			  
?>

<html>
	<head>
		<title>base de dades</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
	    <div class="container mt-3"><center><br>
		<div class="bg-info p-5">
		<h3>SELECCIÓ BASE DE DADES</h3><br>
			<form action="taula.php" method="POST" name="databases">
			 <label for="sel1" class="form-label">Escull la base de dades adequada :)</label>
              <select class="form-select" name="databases" id="databases">
			   
              
          <?php
		  
              $enlace = mysqli_connect($_POST['IP'], $_POST['Usuari'], $_POST['Contrasenya']);
			
              if (!$enlace) {
              echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
              echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
              echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
              exit;
            }
		
			$consulta = "SHOW DATABASES";
			$sql=mysqli_query($enlace, $consulta);
			

            while ($row = mysqli_fetch_row($sql)){
	
							echo "<option>".$row[0]."</option>";
							
					}
      
       
	   
			
            mysqli_close($enlace);
            
   
    ?>
	        </select>
              <br><br>
			  <input type="submit" value="Connectar" class="btn btn-success">
			</form> 
			<form action="inici.html">
				<input type="submit" value="Desconnectar" class="btn btn-danger">
			</form>
	      
		</div>
        </div>    
	</body>
</html>