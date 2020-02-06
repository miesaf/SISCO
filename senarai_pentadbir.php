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

    <title>[SISCO] - Senarai Pentadbir</title>
	<link rel="shortcut icon" href="unitkor.ico">

    <link href="../SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../SISCO/dist/css/timeline.css" rel="stylesheet">

    <link href="../SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../SISCO/bower_components/morrisjs/morris.css" rel="stylesheet">

    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="../SISCO/assets/form-search.css">
	<link rel="stylesheet" href="../assets/form-mini.css">


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
                                    <a class="active" href="senarai_pentadbir.php"> <i class="fa fa-server fa-fw"></i> Pentadbir</a>
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
                    <h1 class="page-header">Senarai Pentadbir</h1>
                </div>
                <!-- /.col-lg-12 -->
			<?php						
				echo '<form id="cari" action="" method="get"><center><font size="3"><td align="right"><b><i>&nbsp;Cari :&nbsp;&nbsp;</i></b><input type="text" name="cari_id" maxlength="10" size="7" autofocus>&nbsp;<button type="submit" form="cari" value="Submit">Cari</button>&nbsp;</td></form></tr></table></center><br>';
				
				// Papar hasil carian
				if (isset($_GET['cari_id']))
				{
					$CARI_ID	= $_GET['cari_id'];
					// create the listing query
					$sql = "SELECT SA_ID, SA_NAME, SA_TYPE FROM ADMINISTRATOR WHERE SA_ID LIKE '%$CARI_ID%' UNION SELECT SA_ID, SA_NAME, SA_TYPE FROM ADMINISTRATOR WHERE SA_NAME LIKE '%$CARI_ID%' UNION SELECT SA_ID, SA_NAME, SA_TYPE FROM ADMINISTRATOR WHERE SA_TYPE LIKE '%$CARI_ID%' ORDER BY SA_TYPE, SA_NAME";
					
					// execute listing query
					$result1 = mysql_query($sql) or die("SQL select statement failed");
				}
				else
				{
					// List
					// create the query
					$sql1 = "SELECT SA_ID, SA_NAME, SA_TYPE FROM ADMINISTRATOR ORDER BY SA_TYPE, SA_NAME";
				
					// execute query
					$result1 = mysql_query($sql1) or die("SQL select statement failed");
				}
				
				// Papar table
			?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><b>Senarai Pentadbir Sistem</b></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombor ID</th>
                                            <th>Nama</th>
                                            <th>Jenis Akaun</th>
											<th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											while ($row = mysql_fetch_array($result1))
											{
												$BIL++;
												
												// extract specific fields
												$SA_ID		= $row["SA_ID"];
												$SA_NAME	= $row["SA_NAME"];
												$SA_TYPE	= $row["SA_TYPE"];
												
												// output student information
												?>
												<tr>
													<td><?php print($BIL); ?></td>
													<td><?php print($SA_ID); ?></td>
													<td><?php print($SA_NAME); ?></td>
													<td><?php print($SA_TYPE); ?></td>
													<td colspan='2'><a target='_blank' href='pinda_pentadbir.php?ID=<?php print($SA_ID); ?>'><input type='button' value='Pinda Akaun' ></a> <a href='sahkan_padam.php?ID=<?php print($SA_ID); ?>'><input type='button' value='Padam Akaun' ></a></td>
												</tr>
												<?php
											}
											if($BIL == 0)
											{
												echo "<tr><td align='center' colspan='5'><i> Tiada data untuk dipaparkan </i></td></tr>";
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
              
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../SISCO/dist/js/sb-admin-2.js"></script>

	<script language="JavaScript">
		function confirmDel(foo)
		{
			var del = confirm("Adakah anda pasti untuk memadam rekod ini?");
			if (del == true)
			{
				window.location.assign("padam_pentadbir.php?ID=" . aidi);
			} else 
			{
				alert("Rekod tidak di padam.");
			}
		}
	</script>

</body>

</html>
