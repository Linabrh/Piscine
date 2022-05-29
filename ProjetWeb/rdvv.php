

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Page d'Accueil </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 10px;    
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      max-height:300px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  .container-fluid iframe{ 
    float : left;
  }

  .container-fluid p {
    margin-top : 100px;
  }

  .navbar-brand img{
    margin-left: 100px;
  }

  body{
    background-color: bg-dark;
  }



  </style>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="logo.png" alt="Omnes Sports" width="50%" height="120%"/> </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="accueil.html">Accueil</a></li>
        <li class="active"><a href="#">Tout Parcourir</a></li>
        <li><a href="#">Rendez-vous</a></li>
        <form class="navbar-form navbar-left" action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
        </div>
        </form>   
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Mon compte </a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activités Sportives<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="muscu.html">Musculation</a></li>
          <li><a href="fitness.html">Fitness</a></li>
          <li><a href="biking.html">Biking</a></li>
          <li><a href="cardio.html">Cardio-Training</a></li>
          <li><a href="cours.html">Cours Collectifs</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Les Sports de compétition <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="basket.html">Basketball</a></li>
          <li><a href="foot.html">Football</a></li>
          <li><a href="rugby.html">Rugby</a></li>
          <li><a href="tennis.html">Tennis</a></li>
          <li><a href="natation.html">Natation</a></li>
          <li><a href="plongeon.html">Plongeon</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Salle de Sport Omnes <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Nos Services</a></li>        
        </ul>
      </li>
    </ul>
  </div>
</nav>


<?php
  //identifier le nom de base de données
 $database = "projetweb";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' ); $db_found = mysqli_select_db($db_handle, $database);
   //si le BDD existe, faire le traitement
  if ($db_found) {
  $sql = "SELECT J FROM RDV";
  $result = mysqli_query($db_handle, $sql); 
 
  //end while
  }//end if
  //si le BDD n'existe pas
  else {
  echo "Database not found";
  }//end else
  //fermer la connection
  mysqli_close($db_handle);
?>

<div class="container ">    
  <h2 class="text-center"> Rendez-Vous </h2>
  <div class="col-sm-8">
      <div class="well">
        <br>
         <table class="table table ">
			<thead>
			  <tr class="danger" >    
				<th class="text-center">Horaire</th>    
				<th class="text-center">Lundi</th>      
				<th class="text-center">Mardi</th>
				<th class="text-center">Mercredi</th>
				<th class="text-center">Jeudi</th>
				<th class="text-center">Vendredi</th>
				<th class="text-center">Samedi</th>
			  </tr>   
			</thead>
			
			<tbody>
				<tr>
					<td class="text-center"> 8h00 </td>
			

			<?php
			if (mysqli_num_rows($result) == 0) 
			{

			} 
			
			else 
			{
				$i = 0;
				while ($data = mysqli_fetch_assoc($result)) 
				{
					$jours[]=$data['J'];
				}
				$jour1="Lundi 8h00";
				$jour2="Mardi 8h00";
				$jour3="Mercredi 8h00";
				$jour4="Jeudi 8h00";
				$jour5="Vendredi 8h00";
				$jour6="Samedi 8h00"; 
			}
			?>
					
					

      

        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="date" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
       ?>

       <?php 
	   $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="date1" value="Mardi 8h00" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
       ?>
       <?php 
	   $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="Me8" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
       ?>
       <?php 
	   $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J8" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
       ?>
       <?php 
	   $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V8" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
       ?>
       <?php 
	   $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S8" class="btn btn-success" style ="height: 100%; width: 100%;">8h00</button></td>';  
         }
		
		
		$jour1="Lundi 10h00";
		$jour2="Mardi 10h00";
		$jour3="Mercredi 10h00";
		$jour4="Jeudi 10h00";
		$jour5="Vendredi 10h00";
		$jour6="Samedi 10h00"; 
       ?>


        
      </tr>
      <tr>
        <td class="text-center"> 10h00 </td>
        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="Me10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S10" class="btn btn-success" style ="height: 100%; width: 100%;">10h00</button></td>';  
         }
		 
		$jour1="Lundi 12h00";
		$jour2="Mardi 12h00";
		$jour3="Mercredi 12h00";
		$jour4="Jeudi 12h00";
		$jour5="Vendredi 12h00";
		$jour6="Samedi 12h00"; 
       ?>
          
      </tr>
      <tr>
        <td class="text-center"> 12h00 </td>

         <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="Me12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
       ?>
       <?php 
       $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S12" class="btn btn-success" style ="height: 100%; width: 100%;">12h00</button></td>';  
         }
		 
		 $jour1="Lundi 14h00";
		$jour2="Mardi 14h00";
		$jour3="Mercredi 14h00";
		$jour4="Jeudi 14h00";
		$jour5="Vendredi 14h00";
		$jour6="Samedi 14h00"; 
       ?>
                
        
            
      </tr>
      <tr>
        <td class="text-center"> 14h00 </td>

        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo ' <td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo ' <td ><button type="button" name="Me14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S14" class="btn btn-success" style ="height: 100%; width: 100%;">14h00</button></td>';  
         }
		 
		 $jour1="Lundi 16h00";
		$jour2="Mardi 16h00";
		$jour3="Mercredi 16h00";
		$jour4="Jeudi 16h00";
		$jour5="Vendredi 16h00";
		$jour6="Samedi 16h00"; 
       ?>
       
        
      </tr>
      <tr>
        <td class="text-center"> 16h00 </td>

        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo ' <td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo ' <td ><button type="button" name="Me16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S16" class="btn btn-success" style ="height: 100%; width: 100%;">16h00</button></td>';  
         }
		 
		 $jour1="Lundi 18h00";
		$jour2="Mardi 18h00";
		$jour3="Mercredi 18h00";
		$jour4="Jeudi 18h00";
		$jour5="Vendredi 18h00";
		$jour6="Samedi 18h00"; 
       ?>
        
 
        
      </tr>
      <tr>
        <td class="text-center"> 18h00 </td>

        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo ' <td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo ' <td ><button type="button" name="Me18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
       ?>
       <?php 
       $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo ' <td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo ' <td ><button type="button" name="S18" class="btn btn-success" style ="height: 100%; width: 100%;">18h00</button></td>';  
         }
		 
		 $jour1="Lundi 20h00";
		$jour2="Mardi 20h00";
		$jour3="Mercredi 20h00";
		$jour4="Jeudi 20h00";
		$jour5="Vendredi 20h00";
		$jour6="Samedi 20h00"; 
       ?>
        
        
       
        
      </tr>
      <tr>
        <td class="text-center"> 20h00 </td>



        <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour1)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="L20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour2)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="M20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour3)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo ' <td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo ' <td ><button type="button" name="Me20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour4)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false){
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="J20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour5)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="V20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
       <?php 
        $dispo = true;
	   for($i = 0; $i < count($jours); $i++)
		{
			if((strcmp($jours[$i],$jour6)==0)) 
			{
				$dispo = false;
			}
		}
		
		if($dispo == false) {
           echo '<td class="text-center" style="background-color:BLACK"> </td>';  }
        else{
        echo '<td ><button type="button" name="S20" class="btn btn-success" style ="height: 100%; width: 100%;">20h00</button></td>';  
         }
       ?>
        
        
        
        
        
      
        
      </tr>
    </tbody>



    
  </table>      
      </div>    
        </div>
 


    <div class="col-sm-4">  
      <div class="well">
        <h4> Votre Rendez-vous : </h4>
        <p> Date : </p>


        
        <input type="submit" name="valider" value="Valider" class="btn btn-danger">
      </div> 
    </div>
  
    
  </div>
<br>






<footer class="container-fluid text-center">

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3377098876335!2d2.2842932156730584!3d48.85177030912682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653484657465!5m2!1sfr!2sfr" width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <p><a>Copyright &copy; 2022 Omnes Santé<br>
		<a href="mailto:salle.sport@omnessports.fr">salle.sport@omnessports.fr</a></p>

</footer>

</body>
</html>