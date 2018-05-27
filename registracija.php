<?php
    include 'db_konekcija.php';
	
	 $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'pocetna.php';
    session_start();
    
    $username = $_POST['username'];	
    $password = $_POST['password'];
    $adresa = $_POST['adresa'];
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $mail=$_POST['mail'];
    $grad = $_POST['grad'];
    $tel=$_POST['tel'];
	$pasos=$_POST['pasos'];
	$dat_rodj=$_POST['dat_rodj'];
	$login=$_POST['login'];
	$reg=$_POST['reg'];
	
	if($login)
	{
		header("Location: http://$host$uri/prijava_klijent.php");  
	}
    
    if($_POST['reg'])
    {
		
        $sqlpr = "SELECT * FROM klijent WHERE br_pasosa LIKE '$pasos'";
        $query2 = mysql_query($sqlpr);
        $izlaz = mysql_num_rows($query2);
		
       if( (!isset($username) || $username == false) || (!isset($password) || $password == false) || (!isset($ime) || $ime == false) || (!isset($prezime) || $prezime == false) || (!isset($pasos) || $pasos == false) || (!isset($dat_rodj) || $dat_rodj == false) || (!isset($mail) || $mail == false )){
		$poruka = '<div class="alert alert-danger"><strong>Greška: </strong>Niste unijeli podatke!</div>';}
        
		else
        {
            if($izlaz != 0)
                $poruka = '<div class="alert alert-danger"><strong>Greška: </strong>Korisnik već postoji!</div>'; 
            else
            {

            $sql3 = "INSERT INTO klijent (id_klijent, ime,prezime,username,password,br_pasosa,datum_rodjenja, grad,adresa, br_tel, e_mail,br_rezervacija,odgovor) VALUES (0, '$ime', '$prezime', '$username', '$password','$pasos','$dat_rodj', '$grad','$adresa', '$tel', '$mail',0,0)";
            $query3 = mysql_query($sql3);
			
			if($query3)
		    	$poruka = '<div class="alert alert-success">Uspješna registracija!</div>'; 
			else
			$poruka = '<div class="alert alert-danger">Neuspješna registracija!</div>'; 
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registracija</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
	
</head>
<body style="background: url('images/bg/ap1.jpg'); width:100%;height:600px; background-repeat:no-repeat;" class="container-fluid;">
 <div class="page-form" style="margin-top:15px;">

        <?php echo $poruka ?>

		<div class="col-md-offset-2 col-md-8 col-md-offset-2" style="background: url('images/bg/bb.jpg');">
		
                <form method="POST" class="form-horizontal" action="registracija.php">
				
                        <div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="username" type="text" placeholder="Username" class="form-control" pattern="^[A-Za-z0-9]{5,}$" title="Min 6 slova! (npr. adis123)" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input id="inputPassword" name="password" type="password" placeholder="Password" class="form-control" pattern="^[A-Za-z0-9]{5,}$" title="Min 6 znakova! (npr. adis123)"/></div>
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label> 
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="ime" type="text" placeholder="Ime" class="form-control" pattern="^[A-Za-zćčžšđČĆŽŠĐ]{1,}$" title="Greška!"/></div>
                            </div>
                        </div>	

			<div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="prezime" type="text" placeholder="Prezime" class="form-control" pattern="^[A-Za-zćčžšđČĆŽŠĐ]{1,}$" title="Greška!"/></div>
                            </div>
                        </div>
						
			<div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="pasos" type="text" placeholder="Broj pasoša" class="form-control" pattern="^[A-Z0-9]{8}$" title="8 znakova! (npr. Axxxxxxx)" /></div>
                            </div>
                        </div>	
						
			<div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
							<div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
									<input id="inputName" name="dat_rodj" type="text" placeholder="Datum rođenja (god-mj-dan)" class="form-control" pattern="[0-9-].{9}" title="Format: godina-mjesec-dan"/></div>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="grad" type="text" placeholder="Grad" class="form-control" pattern="[A-Za-zČĆŽŠĐčćžšđ]+{1,}" title="Greška!" /></div>
                            </div>
                        </div>

		        <div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="adresa" type="text" placeholder="Adresa" class="form-control" pattern="[A-Za-zčćžšđČĆŽŠĐ]+{1,}" title="Greška!"/></div>
                            </div>
                        </div>
						
			<div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="mail" type="text" placeholder="E - mail" class="form-control" pattern="^[a-z@._-].{11,}$" title="Greška!(npr. username@example.com)"/></div>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label for="inputName" class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="tel" type="text" placeholder="Br Telefona (npr. +3876x-xxx-xxx)" class="form-control" pattern="^[0-9+-].{12,}$" title="Greška! npr. +3876x-xxx-xxx"/></div>
                            </div>
                        </div>

                        <div class="form-group mbn">
                            <div class="col-lg-12" align="left">
                                <div class="form-group mbn">
                                    <div class="col-lg-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-12">
											<input type="submit" class="btn btn-default" name="reg" value="Registracija" />
											<input type="submit" class="btn btn-default" name="login" value="Prijava" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
		</div>
	</div>
</body>
</html>