
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Page d'Accueil </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/b8c624c95f.js" crossorigin="anonymous"></script>
  
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
    margin-top : 50px;
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
      <img src="logo.png" alt="Omnes Sports" width="50%" height="120%"/> 
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="accueil.php">Accueil</a></li>
        <li class="active"><a href="parcourir.php">Tout Parcourir</a></li>
        <li><a href="mesrdv.php">Rendez-vous</a></li>
        <li><a href="moncompte.php">Mon Compte</a></li>

        <form class="navbar-form navbar-left" action="recherche.php">

          <div class="input-group">

            <input type="text" class="form-control" placeholder="Search" name="recherche" >
            
          <div class="input-group-btn">

           <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>

        </button>

        </div>
        </div>
        </form>  
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Deconnexion </a></li>
      </ul>
    </div>
  </div>
</nav>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activités Sportives<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="muscu.php">Musculation</a></li>
          <li><a href="fitness.php">Fitness</a></li>
          <li><a href="biking.php">Biking</a></li>
          <li><a href="cardio.php">Cardio-Training</a></li>
          <li><a href="cours.php">Cours Collectifs</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Les Sports de compétition <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="basket.php">Basketball</a></li>
          <li><a href="foot.php">Football</a></li>
          <li><a href="rugby.php">Rugby</a></li>
          <li><a href="tennis.php">Tennis</a></li>
          <li><a href="natation.php">Natation</a></li>
          <li><a href="plongeon.php">Plongeon</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Salle de Sport Omnes <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nosservices.php">Nos Services</a></li>
          
        </ul>
      </li>
    </ul>
  </div>
</nav>

<?php
  //identifier le nom de base de données
 $database = "sport";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', 'root' ); $db_found = mysqli_select_db($db_handle, $database);
   //si le BDD existe, faire le traitement
  if ($db_found) {
  $sql = "SELECT * FROM coach WHERE Sport = 'Basketball'";
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
  <h2 class="text-center"> Basketball</h2>
  <div class="col-sm-4">
      <div class="well">
       <p>Venez à la découverte de basket dans une ambiance décontractée et conviviale. Notre principal objectif est de conduire chaque individu à se développer sur le plan sportif et de permettre à chacun de pouvoir s’épanouir dans la pratique du basket. Pour cela, nous mettons tous les moyens en oeuvre pour permettre à chacun de progresser. </p>
       <p>Prenez des maintenant, un rendez vous avec notre coach !</p>
      
      </div>    
    </div>

    <div class="col-sm-8">  
      <div class="well">
         
       <pre style="border-style: none ;">
        <?php
     if (mysqli_num_rows($result) == 0) {
        echo "<p> Malheuresement aucun caoch n'est disponible pour cette activité.</p>"; 
        echo "" . "<img src='triste.png' alt='photo' width='130' height='140'>" . '<br>';}
         else {
    while ($data = mysqli_fetch_assoc($result)) {
    $image=$data['Photo'] ;
    $nom= $data['Nom'] ;
    $prenom= $data['Prenom'];
    $cv=$data['CV'];
    echo'<div  style="float: left">';   
    echo "" . "<img src='$image' alt='photo' width='130' height='140'>" . '<br>';
    echo"</div>"; 
    echo "Nom: " . $data['Nom'] . ' ';
    echo " " . $data['Prenom'] . '<br>'; 
    echo "        Coach, " . $data['Sport'] . '<br>';
    echo "        Salle: " . $data['Salle'] . '<br>'; 
    echo "        Telephone: " . $data['Telephone'] . '<br>';
    echo "        Mail: " . $data['Mail'] . '<br>';
    }
  }
    
    ?>
      </pre>
      <br>
      <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th>Spécialité</th>
        <th>Coach</th>
        <th colspan="2">Lundi</th>
        <th colspan="2">Mardi</th>
        <th colspan="2">Mercredi</th>
        <th colspan="2">Jeudi</th>
        <th colspan="2">Vendredi</th>
        <th colspan="2">Samedi</th>
      </tr>   
    </thead>
    <tbody>
      <tr>
        <td rowspan="2"><?php echo "" . $nom . ' '; ?></td>
        <td rowspan="2"><?php echo "" . $prenom . ' '; ?></td>
        <td> AM </td>
        <td> PM </td>
        <td> AM </td>
        <td> PM </td>
        <td> AM </td>
        <td> PM </td>
        <td> AM </td>
        <td> PM </td>
        <td> AM </td>
        <td> PM </td>
        <td> AM </td>
        <td> PM </td>
      </tr>
      <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>     
    </tbody>
  </table>
      <div class="text-center">
      <a href="rdv.php"><button type="button" class="btn btn-danger"> Prendre un RDV </button></a>
      <a href="chat.php"><button type="button" class="btn btn-danger"> Communiquer avec le Coach </button></a>
      <?php echo'<a href='.$cv.'><button type="button" class="btn btn-danger""> Voir son CV </button></a>';  ?>
    </div>

      </div> 
    </div>
  
    
  </div>
    

  
    

<br>

<footer class="container-fluid text-center">

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3377098876335!2d2.2842932156730584!3d48.85177030912682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653484657465!5m2!1sfr!2sfr" width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <p>Copyright &copy; 2022 Omnes Sports<br>
    <a href="mailto:salle.sport@omnessports.fr">salle.sport@omnessports.fr</a><br>
    <em>37 Quai de Grenelle, 75015 Paris</em> <br>
    <em> <a href="tel:+13115552368">01 44 39 06 00</a> </em></p>

  <span class="fa-stack fa-lg">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
</svg>
</span>


  <span class="fa-stack fa-lg">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg>
</span>



  <span class="fa-stack fa-lg">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitch" viewBox="0 0 16 16">
  <path d="M3.857 0 1 2.857v10.286h3.429V16l2.857-2.857H9.57L14.714 8V0H3.857zm9.714 7.429-2.285 2.285H9l-2 2v-2H4.429V1.143h9.142v6.286z"/>
  <path d="M11.857 3.143h-1.143V6.57h1.143V3.143zm-3.143 0H7.571V6.57h1.143V3.143z"/>
</svg>
</span>


<span class="fa-stack fa-lg">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
</svg>
</span>


<span class="fa-stack fa-lg">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg>

</span>



</footer>

</body>
</html>