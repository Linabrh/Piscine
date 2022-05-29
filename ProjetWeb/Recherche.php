<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<meta charset="utf-8"/>
		<link href="recherche2.css" rel="stylesheet" type="text/css" />
		<!-- <script type="text/javascript" src="Carrousel.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
	</head>
	
	<body>
		<center>
		
		<form action="http://localhost/Projetweb/Recherche.php" method="post">
			<div class="recherche">
			<input type="text" id="TextRecherche" name="recherche" placeholder="Nom ou Spécialité ou Etablissement" value="<?php if(isset($_POST['recherche'])){echo $_POST['recherche'];}?>">
			<input type="submit" id="butRecherche" value="Recherche">
			
			<?php
				echo "<meta charset=\"utf-8\">";
				header("Content-Type: text/html; charset=utf-8");
				
				//identifier le nom de base de données
				$database = "projetweb";
				
				//connectez-vous dans votre BDD
				//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
				$db_handle = mysqli_connect('localhost', 'root', '' );
				$db_found = mysqli_select_db($db_handle, $database);
				mysqli_set_charset($db_handle,'utf8');
				
				$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";
				if (empty($recherche)) 
				{
					$recherche = "";
				}
				$sql = "";


				 //si le BDD existe, faire le traitement
				if ($db_found) 
				{	
					$sql = 'SELECT * FROM coach c 
								WHERE CONCAT(c.Nom," ",c.Prenom) LIKE "%' . $recherche . '%"
									OR CONCAT(c.Prenom," ",c.Nom) LIKE "%' . $recherche . '%"
									OR c.Nom LIKE "%' . $recherche . '%"
									OR c.Prenom LIKE "%' . $recherche . '%"
									OR c.Spécialité LIKE "%' . $recherche . '%" ';
					
					echo "</div>";
					
					echo "<table cellspacing=\"0\" cellpadding=\"0\">";
					echo "<tr>";
					echo "<th>" . "Nom" . "</th>";
					echo "<th>" . "Prénom" . "</th>";
					echo "<th>" . "Specialité" . "</th>";
					echo "</tr>";
					
					if ($recherche != "")
					{
						$result = mysqli_query($db_handle, $sql);
						
						
						while ($data = mysqli_fetch_assoc($result)) 
						{
							echo "<tr>";
							echo "<td>" . $data['Nom'] . "</td>";
							echo "<td>" . $data['Prenom'] . "</td>";
							echo "<td>" . $data['Spécialité'] . "</td>";
							echo "</tr>";
						}
					}
					echo "</table>";

				} 
				
				else 
				{
					echo "<br>Database not found";
				}
					//fermer la connexion
					mysqli_close($db_handle);
			?>
		</form>
		</center>
	
	
	<!--SELECT * FROM coach WHERE CONCAT(Nom," ",Prenom) LIKE '%Marc Théo%' 
	SELECT * FROM coach c, administrateur a WHERE c.Nom LIKE 'Marc' OR a.Nom Like 'Marc'-->
	
	
	</body>
</html>