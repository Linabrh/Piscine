<!DOCTYPE html>
<html>
	<head>
		<title>Page d'accueil</title>
		<meta charset="utf-8"/>
		<link href="accueil.css" rel="stylesheet" type="text/css" />
		<!-- <script type="text/javascript" src="Carrousel.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="CarrouselJQ.js"></script>
	</head>
	
	<body>
	<div class="wrapper">
		<h1><center>Omnes Santé <a><img src="OmneslogoCut.jpg" alt="OmnesLogo" width="74" height="50"/><img src="Santé.png" alt="SantéLogo" width="74" height="50"/></a></center></h1>
		
			<div class="Navigation"><center>
				<form class="but"><input type="button" value="Accueil" class="but2"></form>
				<form class="but"><input type="button" value="Tout Parcourir" class="but2"></form>
				<form action="http://localhost/Projetweb/Recherche.php" class="but"><input type="submit" value="Recherche" class="but2" ></form>
				<form class="but"><input type="button" value="Rendez-Vous" class="but2"></form>
				<form class="but"><input type="button" value="Votre Compte" class="but2"></form>
			</center></div>
		
		<div class="Section">
			
			
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
				
						
				$sql = "SELECT * FROM accueil";
				
				$divName = "carrousel";
				echo '<div id="'.$divName.'">';	
				$divName = "button";
				$val = "<";
				$className = "prev";
				echo '<input type="'.$divName.'" value="'.$val.'" class="'.$className.'">';
				$val = ">";
				$className = "next";
				echo '<input type="'.$divName.'" value="'.$val.'" class="'.$className.'">';
			
				
				$result = mysqli_query($db_handle, $sql);
			
				$large = 700;
				$haut = 600;		
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "<img src='".$data["Image"]."' width='".$large."' height='".$haut."' />";
				}
				
				echo "</div>";
				
				$divName = "carrouselTexte";
				echo '<div id="'.$divName.'">';
				$className = "scroller";
				echo '<div class='.$className.'>';
				
				$result = mysqli_query($db_handle, $sql);
			
			
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo '<p>'.$data["Texte"].'</p>';
				}
				
				echo '</div>';
				echo '</div>';
				echo '</div>';
			?>
		
		
		<div class="footer"><a>Copyright &copy; 2022 Omnes Santé<br>
		<a href="mailto:salle.sport@omnessports.fr">salle.sport@omnessports.fr</a>
		</div>
	</div>
	
	
	</body>
</html>