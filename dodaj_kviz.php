<?php
	include "db_konekcija.php";

		  session_start();
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: http://$host$uri/index.php");
  }
	
	if(isset($_POST["btn"]))
	{
		
			$sql55="select stanje from kviz where id_kviz=(select max(id_kviz) from kviz)";
			$query55=mysql_query($sql55);
			$stanje_kviz=mysql_fetch_row($query55);
			$stanje_kviz=$stanje_kviz[0];
			
			if($stanje_kviz==0){
		
		$sql546="delete from ucesnici where id_ucesnik!=0";
		$query546=mysql_query($sql546);
		
		$sql547="ALTER TABLE ucesnici AUTO_INCREMENT = 1";
		$query547=mysql_query($sql547);
		
		$pitanje=$_POST["pitanje"];
		$o1=$_POST["o1"];
		$o2=$_POST["o2"];
		$o3=$_POST["o3"];
		$odgovor=$_POST["odg"];
		$br_mjesta=$_POST["br_mjesta"];
		$akcijska_cijena=$_POST["akcijska_cijena"];		
		$id_prijevoza=$_POST["id_prijevoza"];
		$id_admina=$_POST["id_admina"];
		
		
		
		$sql2="insert into kviz(id_kviz, pitanje, opcija_1, opcija_2, opcija_3, odgovor, stanje) values(0,'$pitanje','$o1','$o2', '$o3','$odgovor',1)";
		$query2=mysql_query($sql2);
		if($query2)
			$statusPoruka = '<div class="alert alert-success"><strong>Poruka:</strong> Uspješan unos!</div>';
		else
			$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neuspješan unos!</div>';
		
			
		$sql541="UPDATE klijent
		SET odgovor=0
		WHERE odgovor=1";
		$query2=mysql_query($sql541);
		}
		
		else{
		$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Prethodni kviz nije završen!</div>';
		}
	}

	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zaposlenik</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
    <style>
body {
    font-family: "Lato", sans-serif;

}

.sidenav {
    height: 100%;
    width: 0;	
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: black;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    text-align:center;
	margin-top:200px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s

}

.sidenav a:hover{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>



</head>
  
<body style="background: url('images/bg/k.jpg'); max-width:100%; height:900px;">

<div class="container-fluid;">

<header>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "18%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

   

<div class="col-md-12">
<img src="images/bn5.jpg" alt="LOGO" style="height:200px; width:2000px; max-width:100%;">
</div>



<div class="col-md-12">
	
<nav class="navbar navbar-inverse" style="max-width:100%; background-color:black;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="max-width:100%; margin-left:21%;">

      <ul class="nav navbar-nav" style="font-size:26px;">
	  
        <li><a href="izvjestaj_z.php">IZVJEŠTAJ <span class="sr-only">(current)</span></a></li>
		
		<li><a href="statistika_z.php">STATISTIKA <span class="sr-only">(current)</span></a></li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ARANŽMAN <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="lista_aranzmana.php">Lista aranžmana</a></li>
		    <li><a href="dodaj_aranzman.php">Dodaj aranžman</a></li>
			<li><a href="zavrsi_akciju.php">Završi akciju</a></li>
		    <li><a href="zavrsi_rezervacije.php">Završi rezervacije</a></li>
			<li><a href="lista_rezervacija.php">Lista rezervacija</a></li>
			<li><a href="lista_dojmova_z.php">Dojmovi</a></li>
			</ul>			
	        </li>
		
		<li><a href="lista_klijenata_z.php">KLIJENTI</a></li>
		
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">KVIZ <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li class="active"><a href="dodaj_kviz.php">Dodaj kviz</a></li>
			<li><a href="izaberi_pobjednika.php">Izaberi pobjednika</a></li>
		    <li><a href="lista_dobitnika_z.php">Lista dobitnika</a></li>			
			</ul>			
	        </li>
      </ul>


	  
	  <span class="glyphicon glyphicon-user" aria-hidden="true" style="float:right; padding-top:11px; font-size:16px; color:white;"> <a href="odjava.php" style="color:white; font-size:22px; text-decoration: none;">ODJAVA</a></span>
	  		 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

</header>

	<div class="col-md-offset-3 col-md-6 col-md-offset-3" style=" background-color:#e6f2ff;">

	<div style="font-size:18px; text-align:center; background-color: #b3d6ff;"><h2><b>DODAJ KVIZ</b></h2></div>

	
		<form method="POST" style="padding-top:10px; padding-bottom:10px; padding-left:5px; padding-right:5px;">
			<div class="form-body pal">
			
				<div class="form-group"><input class="form-control" type="text" name="pitanje" placeholder="Unesite pitanje"/></div>

				<div class="form-group"><input class="form-control" type="text" name="o1" placeholder="Unesite opciju 1"/></div>
				
				<div class="form-group"><input class="form-control" type="text" name="o2" placeholder="Unesite opciju 2"/></div>
				
				<div class="form-group"><input class="form-control" type="text" name="o3" placeholder="Unesite opciju 3"/></div>

				<div class="form-group"><input class="form-control" type="text" name="odg" placeholder="Unesite tačan odgovor"/></div>
				
				
				</div>
			
		
		
			<div class="form-actions pal">
				<input class="btn btn-primary" type="submit" name="btn" value="Spremi"/>
			</div>
		</form>
		
		<?php echo $statusPoruka?>
	</div>
		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  </div>
  
  </body>
</html>