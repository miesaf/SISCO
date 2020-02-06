<html>
<head>
	<?php
		session_start();
		if(!$_SESSION['login_sisco'] || ($_SESSION['priv_sisco'] != "TRNR"))
		{
			header("Location: daftar_masuk.php?problem=notLoggedIn");
			exit;
		}
		$name = $_SESSION['name_sisco'];
		
		include('connectDB.php');
		
		// Registering data into the database
		if(isset($_POST['DAFTAR']))
		{
			// Declaring null value for optional variables
			$S_FPNT		= null;
			$S_EXAM		= null;
			$ID2		= null;
			
			// Variables from pendaftaran.php
			$ID2		= $_POST['ID2'];
			$S_FPNT		= $_POST['S_FPNT'];
			$S_EXAM		= $_POST['S_EXAM'];
			
			//SQL query command
			$sql="UPDATE STUDENT SET S_FPNT = '$S_FPNT', S_EXAM = '$S_EXAM' WHERE S_ID = '$ID2'";
			
			// execute query
			$exe_sql = mysql_query($sql);
			
			// confirming the record is added
			if ($exe_sql)
			{
				echo '<html>
						<head>
							<script>
								window.alert("Pindaan berjaya!\nMarkah telah di simpan ke dalam pangkalan data.");
							</script>
							<meta http-equiv="refresh" content="0; url=markah.php" />
						</head>
					</html>';
				
			}
			else
			{
				echo "SQL insert statement failed.<br>" . mysql_error();
				echo '<html>
						<head>
							<script>
								window.alert("Pindaan gagal!\nMarkah tidak di simpan ke dalam pangkalan data");
								window.history.go(-1);
							</script>
						</head>
					</html>';
			}
		}
	?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[SISCO] - Masuk/Pinda Markah</title>
	<link rel="shortcut icon" href="unitkor.ico">

    <link href="../SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../SISCO/dist/css/timeline.css" rel="stylesheet">

    <link href="../SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../SISCO/bower_components/morrisjs/morris.css" rel="stylesheet">

    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="../SISCO/assets/form-search.css">
	<link rel="stylesheet" href="../SISCO/assets/form-mini.css">
	
	<!-- Register Css -->
	<link rel="stylesheet" href="../SISCO/assets/form-register.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sistem SISCO</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php if($_SESSION['priv_sisco'] == "ROOT") { print ("Admin "); }
					else if ($_SESSION['priv_sisco'] == "TRNR") { print ("Jurulatih "); } ?><strong><?php print($name); ?></strong>
                </li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="../SISCO/tukar_kl.php" onclick ="NewWindow('../SISCO/tukar_kl.php','name','720','300','yes');return false;">
                        <i class="fa fa-edit fa-fw"></i> Tukar Kata Laluan
                    </a>
                </li>
				<li class="dropdown">
					<a href="../SISCO/logoff.php">
                        <i class="fa fa-sign-out fa-fw"></i> Daftar Keluar
                    </a>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			<!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
							<!-- HOME -->
                            <a href="utama.php"><i class="fa fa-home fa-fw"></i> Laman Utama</a>
                        </li>
						<?php
							if($_SESSION['priv_sisco'] == "ROOT")
							{
								?>
                        <li>
							<!-- Register -->
                            <a href="#"><i class="fa fa-user-plus fa-fw"></i> Pendaftaran<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<!-- Admin -->
                                    <a href="daftar_pentadbir.php"> <i class="fa fa-edit fa-fw"></i> Pentadbir</a>
                                </li>
                                <li>
									<!-- Trainer -->
                                    <a href="daftar_jurulatih.php"> <i class="fa fa-edit fa-fw"></i> Jurulatih</a>
                                </li>
								<li>
									<!-- Student -->
                                    <a href="daftar_pelajar.php"> <i class="fa fa-edit fa-fw"></i> Pelajar Kor</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
								<?php
							}
						?>
                        <li>
							<!-- Register -->
                            <a href="#"><i class="fa fa-database fa-fw"></i> Senarai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<?php
									if($_SESSION['priv_sisco'] == "ROOT")
									{
										?>
								<li>
									<!-- Admin -->
                                    <a href="senarai_pentadbir.php"> <i class="fa fa-server fa-fw"></i> Pentadbir</a>
                                </li>
                                <li>
									<!-- Trainer -->
                                    <a href="senarai_jurulatih.php"> <i class="fa fa-server fa-fw"></i> Jurulatih</a>
                                </li>
										<?php
									}
								?>
								<li>
									<!-- Student -->
                                    <a href="senarai_pelajar.php"> <i class="fa fa-server fa-fw"></i> Pelajar Kor</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<?php
							if($_SESSION['priv_sisco'] == "TRNR")
							{
								?>
						<li>
							<!-- Markah -->
                            <a href="markah.php"><i class="fa fa-bar-chart-o fa-fw"></i> Markah</a>
                        </li>
								<?php
							}
						?>
                        <li>
							<!-- Register -->
                            <a href="#"><i class="fa fa-comment fa-fw"></i> Makluman<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<!-- Admin -->
                                    <a href="tambah_makluman.php"> <i class="fa fa-edit fa-fw"></i> Tambah Makluman</a>
                                </li>
                                <li>
									<!-- Trainer -->
                                    <a href="senarai_makluman.php"> <i class="fa fa-server fa-fw"></i> Senarai Makluman</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			<?php
				$PINDA_ID	= $_GET['ID'];
				$T_ID	= $_SESSION['ident_sisco'];
				$sql_display = "SELECT T_CRS, T_PLTN FROM TRAINER WHERE T_ID = '$T_ID'";
				$result_dispay = mysql_query($sql_display);
				while($row = mysql_fetch_array($result_dispay))
				{ 
					$CRS = $row["T_CRS"];
					$PLTN = $row["T_PLTN"];
				}
				
				// List
				// create the query
				$sql1 = "SELECT S_ID, S_NAME, S_IC, S_FPNT, S_EXAM FROM STUDENT WHERE S_ID = '$PINDA_ID' AND S_CRS = '$CRS' AND S_PLTN = '$PLTN' ORDER BY S_NAME";
			
				// execute query
				$result1 = mysql_query($sql1) or die("SQL select statement failed");
			
				// Papar table
				$row = mysql_fetch_array($result1);

				// extract specific fields
				$S_ID	= $row["S_ID"];
				$S_NAME	= $row["S_NAME"];
				$S_IC	= $row["S_IC"];
				$S_FPNT	= $row["S_FPNT"];
				$S_EXAM	= $row["S_EXAM"];
					
				// output student information											
			?>
			
			<div class="main-content">

				<!-- You only need this form and the form-register.css -->

				<form class="form-register" method="post" action="pinda_markah.php">
					<input type="hidden" name="ID2" value="<?php print($S_ID); ?>">
					<input type="hidden" name="DAFTAR" value="YES">

					<div class="form-register-with-email">

						<div class="form-white-background">

							<div class="form-title-row">
							<img src="images/unitkor.png" alt="logo kor"><br>
								<h1><i>Pinda/Masuk Markah Pelajar Kor</i></h1>
							</div>

							<div class="form-row"><!--No Matrik-->
								<label>
									<span >Nombor Matrik : </span>
									<th><?php print($S_ID); ?></th>
								</label>
							</div>
							
							<div class="form-row"><!--Nama-->
								<label>
									<span >Nama :</span>
									<th><?php print($S_NAME); ?></th>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Nombor K/P :</span>
									<th><?php print($S_IC); ?></th>
								</label>
							</div>
							
							<div class="form-row"><!--Phone-->
								<label>
									<span>Markah Latihan Padang :</span>
									<input type="text" name="S_FPNT" placeholder="0/20" value="<?php print($S_FPNT); ?>">
								</label>
							</div>
							
							<div class="form-row"><!--Email-->
								<label>
									<span>Markah Peperiksaan Akhir :</span>
									<input type="text" name="S_EXAM" placeholder="0/80" value="<?php print($S_EXAM); ?>">
								</label>
							</div>	

							<div class="form-row">
								<button type="submit">Masuk/Pinda</button>
							</div>

						</div>


					</div>

				</form>

			</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../SISCO/dist/js/sb-admin-2.js"></script>

	

</body>

</html>