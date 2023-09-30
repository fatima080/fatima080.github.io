<?php
session_start();


			
				
					$enlace = mysqli_connect($_SESSION['IP'], $_SESSION['Usuari'], $_SESSION['Contrasenya'], $_SESSION['databases']);
					
					if (!$enlace){ 
						echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
						echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
						echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
						exit;
					}

				
					$sql=mysqli_query($enlace, "SELECT * FROM ".$_SESSION['tables']);
					echo  PHP_EOL;
					echo "<!DOCTYPE registre";
					echo  PHP_EOL;
					echo "[";
					echo  PHP_EOL;
					echo  PHP_EOL;
					
					
					
					if ($row = mysqli_fetch_array($sql)){
					
						
						$query1=mysqli_query($enlace,"DESCRIBE ".$_SESSION['tables']);
						$numr=mysqli_affected_rows($enlace);
						echo "\t";
						echo "<!ELEMENT ".$_SESSION['tables'];
						echo " (";
						
						
						$compt=1;
						while ($row1=mysqli_fetch_array($query1)) {

                        
						 if ($compt!=$numr){
								echo "".$row1[0].",";
						 } else {
								echo "".$row1[0];
						 }
						 $compt++;
						 
						
						}
						echo ")>";
						$query2=mysqli_query($enlace,"DESCRIBE ".$_SESSION['tables']);
						
						 while ($row2=mysqli_fetch_array($query2)) {
							
								echo  PHP_EOL;
								echo "\t";
								echo "\t";
								echo "<!ELEMENT ".$row2[0]." (#PCDATA)>";
						
						 }
						
					}
					echo  PHP_EOL;
					echo "]>";
					
				echo  PHP_EOL;
				echo  PHP_EOL;
				echo  PHP_EOL;
				echo  PHP_EOL;
				echo  PHP_EOL;
			
				
					$enlace = mysqli_connect($_SESSION['IP'], $_SESSION['Usuari'], $_SESSION['Contrasenya'], $_SESSION['databases']);
					
					if (!$enlace){ 
						echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
						echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
						echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
						exit;
					}

					
						echo "<registre>";
						echo  PHP_EOL;
						echo "\t";
						echo "<".$_SESSION['tables'];
						echo ">";
						echo  PHP_EOL;
						echo "\t";
						echo "</".$_SESSION['tables'];
						echo ">";
						echo "\t";
						echo  PHP_EOL;
                        echo "</registre>";

                     
				
					
					
					
					header("Content-type: text/xml");
					header("Content-type: application/force_dowload");
					header("Content-Disposition: attachment; filename=estructura.xml");
					header("Content-Transfer-Ecoding: binary");
					
					mysqli_close($enlace);
				?>
			



