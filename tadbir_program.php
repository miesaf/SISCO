<html>
<head>
	<?php
		session_start();
		if(!$_SESSION['login_sisco'] || $_SESSION['priv_sisco'] != "ROOT")
		{
			header("Location: daftar_masuk.php?problem=notLoggedIn");
			exit;
		}
		$name = $_SESSION['name_sisco'];
		
		include('connectDB.php');
		
		if(isset($_POST['DAFTAR']))
		{	
			// Variables from tadbir_program.php
			$ID_PROG	= $_POST['ID_PROG'];
			$PROG		= $_POST['PROG'];
			
			//SQL query command
			$sql="INSERT INTO PROGRAM (PR_ID, PR_NAME) VALUES ('$ID_PROG', '$PROG')";
			
			// execute query
			$exe_sql = mysql_query($sql);
			
			// confirming the record is added
			if ($exe_sql)
			{
				echo '<html>
						<head>
							<script>
								window.alert("Pendaftaran berjaya!\nProgram telah di simpan ke dalam pangkalan data.");
							</script>
							<meta http-equiv="refresh" content="0; url=tadbir_program.php" />
						</head>
					</html>';
			}
			else
			{
				echo "SQL insert statement failed.<br>" . mysql_error();
				echo '<html>
						<head>
							<script>
								window.alert("Pendaftaran gagal!\nProgram tidak di simpan ke dalam pangkalan data");
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

    <title>[SISCO] - Program (Perkakas Pembangun)</title>

    <!-- Bootstrap Core CSS -->
    <link href="../JCIS/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../JCIS/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../JCIS/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../JCIS/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
		th, td
		{
			padding: 3px;
		}
	</style>
	
	<SCRIPT LANGUAGE="JavaScript">
		function NewWindow(mypage, myname, w, h, scroll) {
		var winl = (screen.width - w) / 2;
		var wint = (screen.height - h) / 2;
		winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable=no'
		win = window.open(mypage, myname, winprops)
		if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
		}
	</script>
	
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
					else if ($_SESSION['priv_sisco'] == "KKOM") { print ("Ketua Kompeni "); } ?><strong><?php print($name); ?></strong>
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

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Program</h1>
						<!-- mula     ##########################################################################################     mula -->
						<form id="tambah_program" action ="tadbir_program.php" method ="POST">
							<input type="hidden" name="DAFTAR" value="YES">
							<table style="BORDER-COLLAPSE: collapse" 
									  bordercolor="#cccccc" align="center" cellspacing="0" 
									  cellpadding="0" border="1">
							<td><table align="center">
								<tr><td align="center"><b>ID Program</b></td><td><input type="text" maxlength="5" size="3" name="ID_PROG">&nbsp;&nbsp;&nbsp;</td>
									<td align="center"><b>Program</b></td><td><input type="text" size="30" maxlength="100" name="PROG">&nbsp;&nbsp;&nbsp;</td>
									<td align="center"><button type="submit" form="tambah_program" value="Submit">Tambah</button></td></tr>
							</table></td></table>
						</form>
						<?php
							// create the listing query
							$sql = "SELECT * FROM PROGRAM ORDER BY PR_ID";
							
							// execute listing query
							$result = mysql_query($sql) or die("SQL select statement failed");

							// Papar table		
							// iterate through all rows in result set
							echo '<table border="0" align="center" cellspacing="2" cellpadding="2">
									<tr>
										<td align="center" valign="top">';
							echo '<table style="BORDER-COLLAPSE: collapse" 
								  bordercolor="#cccccc" align="center" cellspacing="0" 
								  cellpadding="0" border="1">';
							echo '<tbody>
									<tr>';
							echo '<tr><td colspan="5" align="center" height="24" background="../JCIS/images/1_background_table.gif"><div align="center"><b>Senarai Program</b></div></td></tr>';
							echo '<tr><td valign="top"><table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#cccccc" style="BORDER-COLLAPSE: collapse">';
							echo '<tbody>
									<td align="center"><b>ID Program</b></td>
									<td align="center"><b>Program</b></td>
									<td align="center"><b>ID Kampus</b></td><tr>';

							$BIL == 0;
							while ($row = mysql_fetch_array($result))
							{
								$BIL++;
								
								// extract specific fields
								$ID_PROG	= $row["PR_ID"];
								$PROG		= $row["PR_NAME"];
								
								// output student information
								echo "<tr>";
								echo '<td align=center>' . $ID_PROG . '</td><td align=left>' . $PROG . '</td><td align=center>' . $KAMPUS . '</td><td align=center><input type="button" value="Padam Program" onClick=confirmDel("' . $ID_PROG . '") ></td>';
								echo "</tr>"; 
							}
							if($BIL == 0)
							{
								echo "<tr><td align='center' colspan='5'><i> Tiada program untuk dipaparkan </i></td></tr>";
							}
							echo "</table></table><br><br>";
						?>
						<!-- tamat     ########################################################################################     tamat -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../JCIS/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../JCIS/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../JCIS/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../JCIS/dist/js/sb-admin-2.js"></script>
	
	<script language="JavaScript">
		function confirmDel(nums)
		{
			var del = confirm("Adakah anda pasti untuk memadam program ini?");
			if (del == true)
			{
				window.location.assign("padam_program.php?ID=" + nums);
			} else 
			{
				alert("Program tidak di padam.");
			}
		}
	</script>

</body>

</html>
