<html>
<head>
	<?php
		session_start();
		if(isset($_SESSION['auth']))
		{
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[SISCO] - Daftar Masuk</title>
	<link rel="shortcut icon" href="unitkor.ico">
	
	<?php			
		if(isset($_SESSION['login_sisco']))
		{
			header("Location: utama.php");
			exit;
		}
		
		// Clear reset
		include('connectDB.php');
		//SQL query command
		$sql="DELETE FROM J_RESET WHERE TARIKH < DATE_SUB(NOW(), INTERVAL 1 HOUR)";
		// execute query
		$res_sql = mysql_query($sql);
	?>

    <!-- Bootstrap Core CSS -->
    <link href="../SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<link rel="stylesheet" href="../SISCO/login_baru.css" type="text/css">
	<!-- <a href="/daftar_masuk.php">&nbsp;&nbsp;Kembali ke Laman Utama</a><br> -->
	<?php
		// ----------- [MULA] Tugas Gambar NOK
		if(strtotime("2015-06-07") < time()) { /* hide*/ }
		else { echo '<a href="/VIVAXXIV">&nbsp;&nbsp;Aktifkan Akaun User [Tarikh tutup: 7 Jun 2015]<img src=../../NOK24/new.gif></a><br>'; }
		
		if(strtotime("2015-05-07") < time()) { /* hide*/ }
		else { echo '<a href="/NOK25">&nbsp;&nbsp;Tugas Gambar NOK Batch 25 [Tarikh tutup: 7 Jun 2015]<img src=../../NOK25/new.gif></a>'; }
		
		if(strtotime("2015-05-17") < time()) { /* hide*/ }
		else { echo '<br><a href="/NOK26">&nbsp;&nbsp;Tugas Gambar NOK Batch 26 [Tarikh tutup: 17 Mei 2015]<img src=../../NOK26/new.gif></a>'; } 
		// ----------- [TAMAT] Tugas Gambar NOK

		$problem = ""; // 2) Declare
		// $problem = $_GET["problem"];	// 1) Undefined index error
		if(isset($_GET["problem"]))	// 3) The magic function
		{
			$problem = $_GET["problem"];
		}
		$errormsg = "<font color='red'> RALAT: ";
		if($problem == "invalidUser")
		{
			$errormsg = $errormsg . " Nombor Kad Matrik tidak sah!!";
		}
		if($problem == "invalidPassword")
		{
			$errormsg = $errormsg . " Kata Laluan tidak sah!!";
		}
		if($problem == "notLoggedIn")
		{
			$errormsg = $errormsg . " Anda belum mendaftar masuk!!";
		}
		$errormsg = $errormsg . "</font>";
		/* original error
		if($problem != "")
		{
			print($errormsg);
		}
		*/
	?>
	<!-- Promo
	<a href="http://www.000webhost.com/" onClick="this.href='http://www.000webhost.com/862409.html'" target="_blank"><img src="http://www.000webhost.com/images/banners/120x60/banner1.gif" alt="Web hosting" width="120" height="60" border="0" /></a>
	-->
	
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1><strong><center>SISCO<sup><font size="3"></font></sup></center></strong></h1>
						<h5><strong><center>SISTEM KOKURIKULUM<br>UiTM CAWANGAN JOHOR</center></strong></h5>
						<h6><center>"Melangkah Dunia Teknologi Maklumat"</center></h6>
                    </div>
                    <div class="panel-body">
                        <form id="masuk" name="masuk" role="form" action="../SISCO/checkLogin.php" method="post">
                            <fieldset>
								<?php
									if($problem != "")
									{
										echo '<div class="form-group">
												<center><t class="ralat">
													' . $errormsg . '<br><br>
												</t></center></div>';
									}
								?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombor Matrik" name="uname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kata Laluan" name="pword" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<input type="submit" class="btn btn-lg btn-success btn-block" form="masuk" value="Daftar Masuk" />
								<div class="form-group">
									<center>
										<h6>Terlupa Kata Laluan?</h6>
										<h6>Sila hubungi Pentadbir Sistem.</h6>
										<h6>&nbsp;</h6>
										<h6><a href="/SISCO">Kembali ke Laman</a></h6>
									</center>
								</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../SISCO/dist/js/sb-admin-2.js"></script>
	
	<?php
		}
		else
		{
			header("Location: /");
			exit;
		}
	?>
</body>

</html>
