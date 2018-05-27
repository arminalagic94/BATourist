<?php
	include "db_konekcija.php";
	
	session_start();
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: http://$host$uri/index.php");
  }

  
  
 
  
  
	$id_klijenta=$_SESSION['id'];
  
	if(isset($_POST["btn"]))
	{
		$id_aranzmana=$_POST["id_aranzmana"];
		$datum=date("Y/m/d");		
		
		$sql2="insert into rezervacije(id_rezervacija, id_aranzmana, id_klijenta, datum) values(0,'$id_aranzmana','$id_klijenta','$datum')";
		$query2=mysql_query($sql2);
		if($query2)
			$statusPoruka = '<div class="alert alert-success"><strong>Poruka:</strong> Uspješan unos!</div>';
		else
		$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neuspješan unos!</div>';
	
		$sql540="UPDATE aranzmani
		SET br_mjesta=br_mjesta-1
		WHERE naziv_destinacije=(select naziv_destinacije from aranzmani where id_aranzman='$id_aranzmana')";
		$query2=mysql_query($sql540);
		
		$sql541="UPDATE klijent
		SET br_rezervacija=br_rezervacija+1
		WHERE id_klijent='$id_klijenta'";
		$query2=mysql_query($sql541);

		$sql4="insert into moje_destinacije(id_moje, id_aranzmana, id_klijenta) values(0,'$id_aranzmana','$id_klijenta')";
		$query2=mysql_query($sql4);

	}
	    $upit=$_POST["upit"];
	$id_klijent=$_SESSION['id'];
  	$src=$_POST["src"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BATourist</title>

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
    left: 15px;
    background-color: black;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 100px;
    text-align:center;
	margin-top:0px;
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
  
<body style="background: url('images/bg/pl.jpg'); background-size:cover; max-width:100%; max-height:900px;">

<div class="container-fluid;">


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

<header>

<div class="col-md-12">
	
<nav class="navbar navbar-inverse" style="width:100%; background-color:black;">
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="max-width:100%">
	   <div class="col-md-2">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div><img src="images/lg5.jpg" style="width:70%; height:auto;"></div>
  <a href="rezervacija.php">Rezerviši</a>  
  <a href="moj_profil.php">Moj profil</a>
  <a href="moje_destinacije.php">Moja putovanja</a>
  <a href="ostavi_dojam.php">Ostavi dojam</a>
  <a href="#"></a>
</div>

	<div style="padding-top:5px;; text-align:center;">
		<span style="font-size:30px; color:white; cursor:pointer" onclick="openNav()">&#9776; M E N I</span>
	</div>

  </div>
      <ul class="nav navbar-nav" style="font-size:22px;">
	  
        <li><a href="home.php">POČETNA <span class="sr-only">(current)</span></a></li>

		<li><a href="o_nama.php">O NAMA </a></li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PUTOVANJA <span class="caret"></span></a>
          <ul class="dropdown-menu">
		    <li><a href="akcijska.php">Akcijska putovanja</a></li>
			<li role="separator" class="divider"></li>		  
<li class="dropdown-header"><b>Ljetovanje</b></li>
            <li><a href="ljetovanje_afrika.php">Afrika</a></li>	
            <li><a href="ljetovanje_amerika.php">Amerika</a></li>
            <li><a href="ljetovanje_australija.php">Australija</a></li>	
            <li><a href="ljetovanje_azija.php">Azija</a></li>	
            <li><a href="ljetovanje_evropa.php">Evropa</a></li>	
			<li role="separator" class="divider"></li>
<li class="dropdown-header"><b>Zimovanje</b></li>
            <li><a href="zimovanje_afrika.php">Afrika</a></li>
            <li><a href="zimovanje_amerika.php">Amerika</a></li>
            <li><a href="zimovanje_australija.php">Australija</a></li>	
            <li><a href="zimovanje_azija.php">Azija</a></li>	
            <li><a href="zimovanje_evropa.php">Evropa</a></li>
			</ul>			
	        </li>
      </ul>

      <form method="post" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="upit" class="form-control" placeholder="Naziv destinacije" style="width:140px;">
        </div>
        <input type="submit" name="src" class="btn btn-default" style="width:80px;" value="Pretraga">
      </form>
	  
	  <span class="glyphicon glyphicon-user" aria-hidden="true" style="float:right; padding-top:11px; font-size:16px; color:white;"> <a href="odjava.php" style="color:white; font-size:22px; text-decoration: none;">ODJAVA</a></span>
	  		 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
	</header>

	<div class="col-md-offset-3 col-md-6 col-md-offset-3" style=" background-color:#e6f2ff;">
	
		<?php if(!isset($src)){

		?>
		
		<div style="font-size:18px; text-align:center; background-color: #b3d6ff;"><h2><b>REZERVACIJA</b></h2></div>

		<form method="POST" style="padding-top:10px; padding-bottom:10px; padding-left:5px; padding-right:5px;">
			<div class="form-body pal">
			
			<div class="form-group">
				
					<p><b>Izaberite aranžman:</b></p>
					
					<select class="form-control" name="id_aranzmana" ></li>
						<?php
						
							$sql2="select * from aranzmani where stanje=1 and id_aranzman not in(select id_aranzmana from rezervacije where id_klijenta='$id_klijenta')";
							$query2=mysql_query($sql2);
							while($row=mysql_fetch_array($query2)){
						
						?>
									<option value="<?php echo $row["id_aranzman"]?>"><?php echo $row["naziv_destinacije"]?></option>	<?php
							}
						?>
					</select>
				</div>
							
				<div class="form-group"><p>Datum rezervacije: </p> <?php echo date("Y/m/d") ?></div>
				
				</div>
			
			<div class="form-actions pal">
				<input class="btn btn-primary" type="submit" name="btn" value="Spremi"/>
			</div>
		</form>
		

		
	<?php } else {

		?>
		
		    <?php 
        $sql1="select * from aranzmani where stanje=1 and lower(naziv_destinacije)=lower('$upit') and id_aranzman not in(select id_aranzmana from rezervacije where id_klijenta='$id_klijent')";
        $query1=mysql_query($sql1);
		
        if(mysql_num_rows($query1) > 0){
        while($row = mysql_fetch_array($query1)): 
    ?>
		<div class="col-md-6" style="padding:10px;">
	<div class="container-fluid" style="background-color:#98e6e6; height:710px; padding:10px; padding-left:5px; padding-right:5px;">
		
<table class="table">
	

	
	<thead>
	
	<tr>
	<h2 style="background-color:#e6faff;;text-align:center;"><b><?php echo $row['naziv_destinacije'] ?></b></h2>
	<p style="background-color:#e6faff; text-align:center;"><?php echo $row['drzava'] ?></p>
	</tr>
	<tr>
	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $row['slika1'] ?>" style="width:100%; height:250px;" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row['slika2'] ?>" style="width:100%; height:250px;" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
	    <div class="item">
      <img src="<?php echo $row['slika3'] ?>" style="width:100%; height:250px;" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
	
	<div class="item">
      <img src="<?php echo $row['slika4'] ?>" style="width:100%; height:250px;" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
	
  </div>


</div>
	</tr>
	<tr style="background-color:#e6faff"><th>Tip</th> <td><?php echo $row['tip'] ?></td></tr>
	<tr style="background-color:#e6faff;"><th>Br slobodnih mjesta</th><td><?php echo $row['br_mjesta'] ?></td></tr>
    <tr style="background-color:#e6faff;"><th>Datum polaska</th><td><?php echo $row['datum_polaska'] ?></td></tr>
	<tr style="background-color:#e6faff;"><th>Prevoz</th> <td><?php echo $row['tip_prijevoza'] ?></td></tr>
	<tr style="background-color:#e6faff;"><th>Cijena</th> <td><?php
	if($row['akcija']==1)
	echo $row['akcijska_cijena'];
	
	else
	echo $row['cijena'];?> €</td></tr>
	<tr style="background-color:#e6faff;"><th>Ponuda:</th> <td><?php
	if($row['akcija']==1)
	echo Akcija;
	
	else
	echo Redovna;?></td></tr>
	<tr style="background-color:#e6faff;"><th >Opis</th> <td><textarea style="background-color:#e6faff"><?php echo $row['opis'] ?></textarea></td></tr>
    </thead>
	<tbody><tr><th><form action="rezervacija.php" method="POST"><button class="btn btn-primary" type="submit" name="btn" value="<?php echo $row['id_aranzman']?>">Rezerviši</button></form></th><td></td></tr>
</tbody>

</table>
</div>
</div>
    <?php 
				endwhile;
        }
				else {
				
				?>
				
				<h1>Destinacija ne postoji!</h1>
				
				<?php
				
			}
    ?>
	
				<tbody>
	
				</tbody>
					</table> 


			
			
		<?php 
		}
		?>
		
		</div>
		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  </div>
  
  </body>
</html>