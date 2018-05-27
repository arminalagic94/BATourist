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
		$id_kviza=$_POST["id_kviza"];
		
		$sql5="UPDATE kviz SET stanje=0 WHERE id_kviz='$id_kviza'";
		$query5=mysql_query($sql5);
		
		$sql="select count(id_ucesnik) from ucesnici where id_kviz='$id_kviza'";
		$query=mysql_query($sql);
		$br_ucesnika=mysql_fetch_row($query);
		$br_ucesnika=$br_ucesnika[0];

		$pobjednik=rand(1,$br_ucesnika);
		
		$sql11="select username from klijent where id_klijent=(select id_klijent from ucesnici where id_ucesnik='$pobjednik' and id_kviz='$id_kviza')";
		$query11=mysql_query($sql11);
		$username=mysql_fetch_row($query11);
		$username=$username[0];
		
		$sql111="select id_klijent from klijent where username='$username'";
		$query111=mysql_query($sql111);
		$id_klijenta=mysql_fetch_row($query111);
		$id_klijenta=$id_klijenta[0];
		
		
		$sql1111="select * from aranzmani where stanje=1 order by id_aranzman desc";
		$query1111=mysql_query($sql1111);
		$id_aranzmana=mysql_fetch_row($query1111);
		$id_aranzmana=$id_aranzmana[0];	
		
		$datum=date("Y/m/d");	

		$sql22="insert into rezervacije(id_rezervacija, id_klijenta, id_aranzmana, datum) values(0, '$id_klijenta', '$id_aranzmana', '$datum')";
		$query22=mysql_query($sql22);
		
		$sql44="insert into moje_destinacije(id_moje, id_aranzmana, id_klijenta) values(0,'$id_aranzmana','$id_klijenta')";
		$query44=mysql_query($sql44);
		

		$sql222="insert into izvjestaj_kviza(id_izvjestaj_kviza, id_kviza, id_aranzmana, pobjednik, br_ucesnika) values(0,'$id_kviza','$id_aranzmana','$username','$br_ucesnika')";
		$query222=mysql_query($sql222);
		
		if($query222)
			$statusPoruka = '<div class="alert alert-success"><strong>Poruka:</strong> Uspješan unos!</div>';
		else
			$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neuspješan unos!</div>';
		
		
		$sql350="select username from klijent where id_klijent=(select id_klijent from ucesnici where id_ucesnik='$pobjednik')";
		$query7=mysql_query($sql350);
		
		$pobjednik_ime=mysql_fetch_row($query7);
		
		$pobjednik_ime=$pobjednik_ime[0];
		
		$sql355="select naziv_destinacije from aranzmani where stanje=1 and id_aranzman='$id_aranzmana'";
		$query55=mysql_query($sql355);
		
		$ar=mysql_fetch_row($query55);
		
		$ar=$ar[0];
		
		$pobj= '<div class="alert alert-success"><strong>Pobjednik je: ' .$pobjednik_ime.  '</strong></div>';
		$arn= '<div class="alert alert-success"><strong>Aranžman: ' .$ar.  '</strong></div>';
		
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
			<li><a href="dodaj_kviz.php">Dodaj kviz</a></li>
			<li class="active"><a href="izaberi_pobjednika.php">Izaberi pobjednika</a></li>
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
	
	<div style="font-size:18px; text-align:center; background-color: #b3d6ff;"><h2><b>IZABERI POBJEDNIKA</b></h2></div>

	
			<p>Izaberite kviz koji želite završiti:</p>
	
			<form method="POST" style="padding-top:10px; padding-bottom:10px; padding-left:5px; padding-right:5px;">
			<div class="form-body pal">
			
				<div class="form-group">

					<select class="form-control" name="id_kviza" ></li>
						<?php
						
							$sql4="select * from kviz where stanje=1 order by id_kviz desc";
							$query5=mysql_query($sql4);
							while($row=mysql_fetch_array($query5)){
						
						?>
							<option value="<?php echo $row["id_kviz"]?>"><?php echo $row["pitanje"]?></option>	<?php
							}
						?>
					</select>
					
				</div>
				
			</div>
					
			<div class="form-actions pal">
				<input class="btn btn-primary" type="submit" name="btn" value="Izaberi pobjednika"/>
			</div>
					
			</form>
			
			<?php echo $pobj;?>
			<?php echo $arn;?>
		
		</div>
		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  </div>
  
  </body>
</html>