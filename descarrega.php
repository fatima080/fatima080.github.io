 <?php
            session_start();
			
			
			$_SESSION['tables']=$_POST['tables'];
			
?>

<html>
	<head>
		<title>Descarrega</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
	    <div class="container mt-3"><center><br>
		<div class="bg-info p-5">
		<h3>SELECCIONA DESCÀRREGA</h3><br><br>
			<form action="estructura.php" method="POST" name="descarrega" id="descarrega">
              
           <?php
			
              $enlace = mysqli_connect($_SESSION['IP'], $_SESSION['Usuari'], $_SESSION['Contrasenya'], $_SESSION['databases']); //, $_SESSION['tables']
			
              if (!$enlace) {
              echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
              echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
              echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
              exit;
            }
		
		            echo "Has seleccionat la base de dades:  ".$_SESSION["databases"];
					echo "<br>";
					echo "Has seleccionat la taula:  ".$_SESSION["tables"]; 
				
			       
                   
           
			
            mysqli_close($enlace);
            
   
    ?>
              <br><br>
			  <input type="submit" value="Estructura" class="btn btn-success">
			</form>
			<form action="estructuradades.php">
				<input type="submit" value="Estructura+Dades" class="btn btn-success">
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