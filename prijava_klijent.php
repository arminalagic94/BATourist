<?php
    include 'db_konekcija.php';
	
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'pocetna.php';
    session_start();


    $username=$_POST['username'];
    $password=$_POST['password'];
    $login=$_POST['login'];
	$reg=$_POST['reg'];
	
	if($reg)
	{
		header("Location: http://$host$uri/registracija.php");  
	}

    if($login)
    {
        if( $username != "" && $password != "")
        {
            $sql="select * from klijent where username like'$username'";
            $query=mysql_query($sql);
            $numrows=mysql_num_rows($query);
            $korisnik_id=array();

            if($numrows!=0)
            {
                while($row=mysql_fetch_assoc($query))
                {
                    $dbidkorisnik=$row['id_klijent'];
                    $dbusername=$row['username'];
                    $dbpass=$row['password'];
                    $_SESSION['admin']=$row['admin'];
                }

                if($username==$dbusername&&$password==$dbpass)
                {
                    $_SESSION['id']=$dbidkorisnik;
                    $_SESSION['korisnik']=$dbusername;
                    header("Location: http://$host$uri/home.php");  
                }
                else
                    $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neispravna lozinka!</div>'; 
            }
            else
                $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Korisnik ne postoji!</div>';
        }
        else
            $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Niste unijeli podatke!</div>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, basic, centered, links" />
	<link rel="stylesheet" href="css/footer-basic-centered.css">


    <title>Login</title>
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
       <?php echo $statusPoruka; ?>
	<div class="page-form">
     

		<div class="col-md-offset-3 col-md-6 col-md-offset-3" style="background: url('images/bg/bb.jpg');margin-top:-150px;">

                <form method="POST" class="form-horizontal">
                <div class="form-body pal">
                    <div class="form-group">
                        <label for="inputName" class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="username" type="text" placeholder="Username" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" name="password" type="password" placeholder="Password" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-md-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                                <div class="col-md-3">
									<input type="submit" class="btn btn-default" name="login" value="Prijava" />
                                </div>
								
								<div class="col-md-3">
									<input type="submit" class="btn btn-default" name="reg" value="Registracija" />
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
