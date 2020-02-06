<html>
<head>
	<?php
		session_start();
		if(!$_SESSION['login_sisco'] || ($_SESSION['priv_sisco'] == "TRNR"))
		{
			header("Location: daftar_masuk.php?problem=notLoggedIn");
			exit;
		}
		$name	= $_SESSION['name_sisco'];
		
		include('connectDB.php');
		
		// Registering data into the database
		if(isset($_POST['DAFTAR']))
		{
			// Declaring null value for optional variables
			$S_MAIL		= null;
			$S_RVNR		= null;
			$S_BLOOD	= null;
			$S_HEALTH	= null;
			$S_ALGY		= null;
			
			// Variables from pendaftaran.php
			$S_ID		= $_POST['S_ID'];
			$S_NAME		= $_POST['S_NAME'];
			$S_IC		= $_POST['S_IC'];
			$S_SEX		= $_POST['S_SEX'];
			$S_ADDR		= $_POST['S_ADDR'];
			$S_TEL		= $_POST['S_TEL'];
			$S_MAIL		= $_POST['S_MAIL'];
			$S_RLTV		= $_POST['S_RLTV'];
			$S_RVNR		= $_POST['S_RVNR'];
			$S_SIZE		= $_POST['S_SIZE'];
			$S_RLGN		= $_POST['S_RLGN'];
			$S_PROG		= $_POST['S_PROG'];
			$S_PART		= $_POST['S_PART'];
			$S_CRS		= $_POST['S_CRS'];
			$S_PLTN		= $_POST['S_PLTN'];
			$S_RSDN		= $_POST['S_RSDN'];
			$S_BLOOD	= $_POST['S_BLOOD'];
			$S_HEALTH	= $_POST['S_HEALTH'];
			$S_ALGY		= $_POST['S_ALGY'];
			
			//SQL query command
			$sql="INSERT INTO STUDENT(S_ID, S_NAME, S_IC, S_SEX, S_ADDR, S_TEL, S_MAIL, S_RLTV, S_RVNR, S_SIZE, S_RLGN, S_PROG, S_PART, S_CRS, S_PLTN, S_RSDN, S_BLOOD, S_HEALTH, S_ALGY) VALUES ('$S_ID', '$S_NAME', '$S_IC', '$S_SEX', '$S_ADDR', '$S_TEL', '$S_MAIL', '$S_RLTV', '$S_RVNR', '$S_SIZE', '$S_RLGN', '$S_PROG', '$S_PART', '$S_CRS', '$S_PLTN', '$S_RSDN', '$S_BLOOD', '$S_HEALTH', '$S_ALGY')";
			
			// execute query
			$exe_sql = mysql_query($sql);
			
			// confirming the record is added
			if ($exe_sql)
			{
				echo '<html>
						<head>
							<script>
								window.alert("Pendaftaran berjaya!\nRekod telah di simpan ke dalam pangkalan data.");
							</script>
							<meta http-equiv="refresh" content="0; url=rincian_pelajar.php?ID=' . $S_ID . '" />
						</head>
					</html>';
				
			}
			else
			{
				echo "SQL insert statement failed.<br>" . mysql_error();
				echo '<html>
						<head>
							<script>
								window.alert("Pendaftaran gagal!\nRekod tidak di simpan ke dalam pangkalan data");
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

    <title>[SISCO] - Pendaftaran Pelajar</title>
	<link rel="shortcut icon" href="unitkor.ico">

    <!-- Bootstrap Core CSS -->
    <link href="../SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../SISCO/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="../SISCO/bower_components/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
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
					else if ($_SESSION['priv_sisco'] == "TRNR") { print ("Jurulatih "); }
					else if ($_SESSION['priv_sisco'] == "USER") { print ("Selamat Datang "); } ?><strong><?php print($name); ?></strong>
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
                                    <a class="active" href="daftar_pelajar.php"> <i class="fa fa-edit fa-fw"></i> Pelajar Kor</a>
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
			<div class="main-content">

				<!-- You only need this form and the form-register.css -->

				<form class="form-register" method="post" action="daftar_pelajar.php">
					<input type="hidden" name="DAFTAR" value="YES">

					<div class="form-register-with-email">

						<div class="form-white-background">

							<div class="form-title-row">
							<img src="images/unitkor.png" alt="logo kor"><br>
								<h1><i>Pendaftaran Pelajar Kor</i></h1>
							</div>

							<div class="form-row"><!--No Matrik-->
								<label>
									<span >Nombor Matrik :</span>
									<input type="text" name="S_ID">
								</label>
							</div>
							
							<div class="form-row"><!--Nama-->
								<label>
									<span >Nama :</span>
									<input type="text" name="S_NAME">
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Nombor K/P :</span>
									<input type="text" name="S_IC" placeholder="xxxxxx-xx-xxxx">
								</label>
							</div>
							
							<div class="form-row"><!--Gender-->
								<label>
									<span>Jantina :</span>
									<select name="S_SEX">
										<option>Sila pilih</option>
										<option value="Lelaki">Lelaki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Address-->
								<label>
									<span>Alamat :</span>
									<textarea name="S_ADDR"></textarea>
								</label>
							</div>
							
							<div class="form-row"><!--Phone-->
								<label>
									<span>Nombor Telefon :</span>
									<input type="text" name="S_TEL" placeholder="xxx-xxxx xxx" >
								</label>
							</div>
							
							<div class="form-row"><!--Email-->
								<label>
									<span>E-Mel:</span>
									<input type="text" name="S_MAIL" placeholder="xxxxx@xxx.com">
								</label>
							</div>
							
							<div class="form-subtitle-row">
								<h5><i>Waris</i></h5>
							</div>
							
							<div class="form-row"><!--Relative-->
								<label>
									<span>Nama Waris :</span>
									<input type="text" name="S_RLTV" placeholder = "Nama Bapa/Ibu/Saudara">
								</label>
							</div>
							
							<div class="form-row"><!--Phone Relative-->
								<label>
									<span>Nombor Waris :</span>
									<input type="text" name="S_RVNR" placeholder="xxx-xxxx xxx">
								</label>
							</div>
							
							<div class="form-subtitle-row">
								<h5><i>Maklumat Tambahan</i></h5>
							</div>
							
							<div class="form-row"><!--Size-->
								<label>
									<span>Saiz Baju :</span>
									<select name="S_SIZE">
										<option>Sila pilih</option>
										<option value="XS">XS</option>
										<option value="S">S</option>
										<option value="M">M</option>
										<option value="L">L</option>
										<option value="XL">XL</option>
										<option value="XXL">XXL</option>
										<option value="XXXL">XXXL</option>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Religion-->
								<label>
									<span>Agama :</span>
									<input type="text" name="S_RLGN">
								</label>
							</div>
							
							<div class="form-row"><!--Program-->
								<label>
									<span>Program :</span>
									<select name="S_PROG">
										<option> Sila pilih </option>
											<?php
											$sql_choose = "SELECT * FROM PROGRAM ORDER BY PR_ID";
											$result_choose = mysql_query($sql_choose);
											while ($row = mysql_fetch_array($result_choose))
											{
												$PROG1 = $row["PR_ID"];
												$PROG2 = $row["PR_NAME"];
												echo '<option value="' . $PROG1 . '"> ' . $PROG1 . ' - ' . $PROG2 . '</option>';
											} ?>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Part-->
								<label>
									<span>Bahagian :</span>
									<select name="S_PART">
										<option>Sila pilih</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Kor Code-->
								<label>
									<span>Kursus Kor :</span>
									<select name="S_CRS">
										<option> Sila pilih </option>
											<?php
											$sql_choose = "SELECT * FROM COURSE ORDER BY CR_ID";
											$result_choose = mysql_query($sql_choose);
											while ($row = mysql_fetch_array($result_choose))
											{
												$CRS1 = $row["CR_ID"];
												$CRS2 = $row["CR_NAME"];
												echo '<option value="' . $CRS1 . '"> ' . $CRS1 . ' - ' . $CRS2 . '</option>';
											} ?>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Platoon-->
								<label>
									<span>Platun :</span>
									<select name="S_PLTN">
										<option>Sila pilih</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
										<option value="E">E</option>
										<option value="F">F</option>
										<option value="G">G</option>
										<option value="H">H</option>
										<option value="I">I</option>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Residency-->
								<label>
									<span>Kolej Kediaman :</span>
									<input type="text" name="S_RSDN" placeholder="eg:Taming Sari">
								</label>
							</div>
							
							<div class="form-row"><!--Blood-->
								<label>
									<span>Kumpulan Darah :</span>
									<select name="S_BLOOD">
										<option>Sila pilih</option>
										<option value="AB Positif"> AB Positif </option>
										<option value="AB Negatif"> AB Negatif </option>
										<option value="A Positif"> A Positif </option>
										<option value="A Negatif"> A Negatif </option>
										<option value="B Positif"> B Positif </option>
										<option value="B Negatif"> B Negatif </option>
										<option value="O Positif"> O Positif </option>
										<option value="O Negatif"> O Negatif </option>
									</select>
								</label>
							</div>
							
							<div class="form-row"><!--Remarks-->
								<label>
									<span>Sejarah Kesihatan :</span>
									<textarea name="S_HEALTH"></textarea>
								</label>
							</div>
							
							<div class="form-row"><!--Allergy-->
								<label>
									<span>Alahan :</span>
									<input type="text" name="S_ALGY">
								</label>
							</div>							

							<div class="form-row">
								<button type="submit">Daftar</button>
							</div>

						</div>


					</div>

				</form>

			</div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="../SISCO/bower_components/raphael/raphael-min.js"></script>
	<script src="../SISCO/bower_components/morrisjs/morris.min.js"></script> 
    <script src="../SISCO/js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="../SISCO/dist/js/sb-admin-2.js"></script>

</body>

</html>
