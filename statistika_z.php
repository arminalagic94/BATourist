<?php

    include 'db_konekcija.php';

  session_start();
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: http://$host$uri/index.php");
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


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
  
  <body style="background: url('images/bg/k.jpg'); width:100%; height:900px;">
  <div class="container-fluid;">

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "18%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<div>     

<div class="col-md-12">
<img src="images/bn5.jpg" alt="LOGO" style="height:200px; width:2000px; max-width:100%;">
</div>

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
		
		<li class="active"><a href="statistika_z.php">STATISTIKA <span class="sr-only">(current)</span></a></li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ARANŽMAN <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li class="active"><a href="lista_aranzmana.php">Lista aranžmana</a></li>
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

<div class="col-md-12" style="text-align:center;">

    <?php
	
		$id_z=$_SESSION["id"];
		
		$sql2="select sum(br_rezervacija) from izvjestaj where id_aranzmana in (select id_aranzman from aranzmani where id_admina='$id_z')";
		$query2=mysql_query($sql2);
		$br_rezervacija=mysql_fetch_row($query2);
		$br_rezervacija=$br_rezervacija[0];
		
		$sql3="select avg(br_rezervacija) from izvjestaj where id_aranzmana in (select id_aranzman from aranzmani where id_admina='$id_z')";
		$query3=mysql_query($sql3);
		$pr_rezervacija=mysql_fetch_row($query3);
		$pr_rezervacija=$pr_rezervacija[0];
		
		$sql4="select sum(prihod) from izvjestaj where id_aranzmana in (select id_aranzman from aranzmani where id_admina='$id_z')";
		$query4=mysql_query($sql4);
		$prihod=mysql_fetch_row($query4);
		$prihod=$prihod[0];
		
		$sql5="select avg(prihod) from izvjestaj where id_aranzmana in (select id_aranzman from aranzmani where id_admina='$id_z')";
		$query5=mysql_query($sql5);
		$pr_prihod=mysql_fetch_row($query5);
		$pr_prihod=$pr_prihod[0];
		
		$sql6="select count(id_aranzman) from aranzmani where id_admina='$id_z'";
		$query6=mysql_query($sql6);
		$br_ar=mysql_fetch_row($query6);
		$br_ar=$br_ar[0];
		
		$sql7="select avg(ocjena) from ocjena_aranzmana where id_aranzmana in (select id_aranzman from aranzmani where id_admina='$id_z')";
		$query7=mysql_query($sql7);
		$ocjene=mysql_fetch_row($query7);
		$ocjene=$ocjene[0];
	
        $dataPoints = array(
            array("y" => $br_rezervacija, "label" => "Br rezervacija"),
            array("y" => $pr_rezervacija, "label" => "Prosjek rezervacija"),
            array("y" => $prihod, "label" => "Ukupan prihod"),
            array("y" => $pr_prihod, "label" => "Prosječan prihod"),
            array("y" => $br_ar, "label" => "Br aranžmana"),
            array("y" => $ocjene, "label" => "Prosječna ocjena aranžmana"),
        );
    ?>
 

        <div id="chartContainer"></div>
 
        <script type="text/javascript">
 
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "theme2",
                    animationEnabled: true,
                    title: {
                        text: "Statistički prikaz poslovanja zaposlenika"
                    },
                    data: [
                    {
                        type: "column",                
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }
                    ]
                });
                chart.render();
            });
        </script>



</div>
	
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  </body>
</html>