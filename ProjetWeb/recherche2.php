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
						OR c.Prenom LIKE "%' . $recherche . '%" ';
		
		echo "<table border=\"1\">";
		echo "<tr>";
		echo "<th>" . "ID" . "</th>";
		echo "<th>" . "Nom" . "</th>";
		echo "<th>" . "Prénom" . "</th>";
		echo "<th>" . "Specialité" . "</th>";
		echo "<th>" . "Id_admin" . "</th>";
		echo "</tr>";
		
		if ($recherche != "")
		{
			$result = mysqli_query($db_handle, $sql);
			
			
			while ($data = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>" . $data['Id_coach'] . "</td>";
				echo "<td>" . $data['Nom'] . "</td>";
				echo "<td>" . $data['Prenom'] . "</td>";
				echo "<td>" . $data['Spécialité'] . "</td>";
				echo "<td>" . $data['Id_administrateur'] . "</td>";
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