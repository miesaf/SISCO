<html>
<head>
	<?php
		session_start();
		if((!$_SESSION['login_sisco']) || ($_SESSION['priv_sisco'] != "ROOT"))
		{
			header("Location: daftar_masuk.php?problem=notLoggedIn");
			exit;
		}
		$name = $_SESSION['name_sisco'];
		
		include('connectDB.php');
	?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[SISCO] - Butiran Jurulatih</title>
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
    <link href="../SISCO/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- SISCO PLACE 
	
    <link href="../SISCO/SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../SISCO/SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../SISCO/SISCO/dist/css/timeline.css" rel="stylesheet">

    <link href="../SISCO/SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../SISCO/SISCO/bower_components/morrisjs/morris.css" rel="stylesheet">

    <link href="../SISCO/SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	-->


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
					<a class="dropdown-toggle" data-toggle="dropdown" href="../SISCO/JCIS/tukar_kl.php" onclick ="NewWindow('../SISCO/JCIS/tukar_kl.php','name','720','300','yes');return false;">
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
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Butiran Jurulatih</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<center>
                            <b>Butiran Jurulatih</b>
							<center>
                        </div>
                        <!-- /.panel-heading -->
						<?php
							if(isset($_GET['ID']))
							{
								$ID		= $_GET['ID'];
							}
							
							if($ID == "" || !is_numeric($ID))
							{
								$ID = 0;
							}

							// create the query
							$sql = "SELECT * FROM TRAINER WHERE T_ID = $ID";
							
							// execute query
							$result = mysql_query($sql) or die("SQL select statement failed");
							
							// iterate through all rows in result set
							if($row = mysql_fetch_array($result))
							{
								// extract specific fields
								$T_ID		= $row['T_ID'];
								$T_NAME		= $row['T_NAME'];
								$T_IC		= $row['T_IC'];
								$T_SEX		= $row['T_SEX'];
								$T_ADDR		= $row['T_ADDR'];
								$T_TEL		= $row['T_TEL'];
								$T_MAIL		= $row['T_MAIL'];
								$T_BANK		= $row['T_BANK'];
								$T_CRS		= $row['T_CRS'];
								$T_PLTN		= $row['T_PLTN'];
								$T_EXP		= $row['T_EXP'];
								
								// Decode codes into string
								$sql_display = "SELECT CR_NAME FROM COURSE WHERE CR_ID = '$T_CRS'";
								$result_dispay = mysql_query($sql_display);
								while($row = mysql_fetch_array($result_dispay)) { $DCRS = $row["CR_NAME"]; }
						?>
                        <div class="panel-body">
							
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
									<thead>
										<tr>
											<td colspan="2">
												<center>
													<b>Maklumat Peribadi</b>
												</center>
											</td>
										</tr>
									</thead>
									
                                    <tbody>
                                        <tr>
                                            <th>Nombor Staff </th>
                                            <td><?php print($T_ID); ?></td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <th>Nama </th>
                                            <td><?php print($T_NAME); ?></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <th>Nombor K/P </th>
                                            <td><?php print($T_IC); ?></td>  
                                        </tr>
										<tr>
											<th>Jantina </th>
											<td><?php print($T_SEX); ?></td>
										</tr>
										<tr>
											<th>Alamat </th>
											<td><?php print($T_ADDR); ?></td>
										</tr>
										<tr>
											<th>No Telefon </th>
											<td><?php print($T_TEL); ?></td>
										</tr>
										<tr>
											<th>E-Mel </th>
											<td><?php print($T_MAIL); ?></td>
										</tr>
										<tr>
											<th>Nombor Akaun Bank </th>
											<td><?php print($T_BANK); ?></td>
										</tr>
                                    </tbody>
									
									<thead>
										<tr>
											<td colspan="2">
												<center>
													<b>Maklumat Tambahan</b>
												</center>
											</td>
										</tr>
									</thead>
									<tbody>
										<tr>
                                            <th>Kursus Kor </th>
                                            <td><?php print($T_CRS); ?></td>     
                                        </tr>
										<tr>
                                            <th>Platun </th>
                                            <td><?php print($T_PLTN); ?></td>     
                                        </tr>
										<tr>
                                            <th>Pengalaman </th>
                                            <td><?php print($T_EXP); ?></td>     
                                        </tr>
										<tr>
                                            <td align='center' colspan='2'><a target='_blank' href='pinda_jurulatih.php?ID=<?php print($T_ID); ?>'><input type='button' value='Pinda Rekod' ></a> <input type='button' value='Padam Rekod' onClick=confirmDel() ></td>     
                                        </tr>
                                    </tbody>
									
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
						<?php
							}
								else
								{
									?>
									<tr>
										<td align='center' colspan='2'><center><i> Tiada data untuk dipaparkan </i></center></td>     
									</tr>
									<?php
								}
						?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
	
	
	<!-- SISCO PLACE
	
    <script src="../SISCO/SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../SISCO/SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../SISCO/SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../SISCO/SISCO/dist/js/sb-admin-2.js"></script>
	-->
	
	<script language="JavaScript">
		function confirmDel()
		{
			var del = confirm("Adakah anda pasti untuk memadam rekod ini?");
			if (del == true)
			{
				window.location.assign("padam_jurulatih.php?ID=<?php print($T_ID); ?>");
			} else 
			{
				alert("Rekod tidak di padam.");
			}
		}
	</script>

</body>

</html>
