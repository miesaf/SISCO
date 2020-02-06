<html>
<head>
	<?php
		include('connectDB.php');
		
		// Registering data into the database
		if(isset($_POST['DAFTAR']))
		{
			// Declaring null value for optional variables
			$S_ID	= null;
			$S_IC	= null;
			
			// Variables from pendaftaran.php
			$EN_ID		= $_POST['S_ID'];
			$EN_IC		= $_POST['S_IC'];
			
			//SQL query command
			$sql="SELECT S_IC FROM STUDENT WHERE S_ID = '$EN_ID'";
			
			// execute query
			$exe_sql = mysql_query($sql);
			
			// confirming the record is added
			while ($row = mysql_fetch_array($exe_sql))
			{
				if($EN_IC == $row["S_IC"])
				{
					$DISPLAY = true;
					$DIS_ID = $EN_ID;
				}
				else
				{
					$DISPLAY = false;
					echo '<html>
							<head>
								<script>
									window.alert("Keputusan gagal dipaparkan!\nSila semak semula nombor matrik dan nombor kad pengenanlan anda");
									window.history.go(-1);
								</script>
							</head>
						</html>';
				}
			}
		}
		else
		{
			$DISPLAY = false;
		}
	?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[SISCO] - Keputusan Kor</title>
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
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			<!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
							<!-- HOME -->
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Sistem SISCO </a>
                        </li>
                        <li>
							<!-- Register -->
                            <a target="_blank" href="daftar_masuk.php"><i class="fa fa-sign-in fa-fw"></i> Daftar Masuk </a>
                        </li>
						<li>
							<!-- Register -->
                            <a target="_blank" href="keputusan.php"><i class="fa fa-envelope fa-fw"></i> Keputusan Kor </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
		<?php
			if($DISPLAY == false)
			{
				?>
			<div class="main-content">
				<!-- You only need this form and the form-register.css -->
				<form class="form-register" method="post" action="keputusan.php">
					<input type="hidden" name="DAFTAR" value="YES">
					<div class="form-register-with-email">
						<div class="form-white-background">
							<div class="form-title-row">
							<img src="images/unitkor.png" alt="logo kor"><br>
								<h1><i>Keputusan Kor</i></h1>
							</div>

							<div class="form-row"><!--No Matrik-->
								<label>
									<span >Nombor Matrik :</span>
									<input type="text" name="S_ID" placeholder="201xxxxxxx">
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Nombor K/P :</span>
									<input type="text" name="S_IC" placeholder="xxxxxx-xx-xxxx">
								</label>
							</div>

							<div class="form-row">
								<button type="submit">Papar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
				<?php
			}
			
			if($DISPLAY == true)
			{
				//SQL query command
				$sql="SELECT S_ID, S_NAME, S_IC, S_PROG, S_CRS, S_PLTN, S_FPNT, S_EXAM FROM STUDENT WHERE S_ID = '$EN_ID'";
				
				// execute query
				$exe_sql = mysql_query($sql);
				
				// confirming the record is added
				$row = mysql_fetch_array($exe_sql);
				
				$S_ID		= $row['S_ID'];
				$S_NAME		= $row['S_NAME'];
				$S_IC		= $row['S_IC'];
				$S_PROG		= $row['S_PROG'];
				$S_CRS		= $row['S_CRS'];
				$S_PLTN		= $row['S_PLTN'];
				$S_FPNT		= $row['S_FPNT'];
				$S_EXAM		= $row['S_EXAM'];
				
				// Decode codes into string
				$sql_display = "SELECT CR_NAME FROM COURSE WHERE CR_ID = '$S_CRS'";
				$result_dispay = mysql_query($sql_display);
				while($row = mysql_fetch_array($result_dispay)) { $DCRS = $row["CR_NAME"]; }
				
				$sql_display = "SELECT PR_NAME FROM PROGRAM WHERE PR_ID = '$S_PROG'";
				$result_dispay = mysql_query($sql_display);
				while($row = mysql_fetch_array($result_dispay)) { $DPROG = $row["PR_NAME"]; }
				?>
			<div class="main-content">
				<!-- You only need this form and the form-register.css -->
				<form class="form-register" method="post" action="keputusan.php">
					<input type="hidden" name="DAFTAR" value="YES">
					<div class="form-register-with-email">
						<div class="form-white-background">
							<div class="form-title-row">
							<img src="images/unitkor.png" alt="logo kor"><br>
								<h1><i>Keputusan Kor</i></h1>
							</div>

							<div class="form-row"><!--No Matrik-->
								<label>
									<span >Nombor Matrik :</span>
									<?php print($S_ID); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Nama :</span>
									<?php print($S_NAME); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Nombor K/P :</span>
									<?php print($S_IC); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Program :</span>
									<?php print($S_PROG . " - " . $DPROG); ?>
								</label>
							</div>

							<div class="form-row"><!--IC-->
								<label>
									<span>Kursus Kor :</span>
									<?php print($S_CRS . " - " . $DCRS); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Platun :</span>
									<?php print($S_PLTN); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Markah Latihan Padang :</span>
									<?php print($S_FPNT . "/20"); ?>
								</label>
							</div>
							
							<div class="form-row"><!--IC-->
								<label>
									<span>Markah Peperiksaan Akhir :</span>
									<?php print($S_EXAM . "/80"); ?>
								</label>
							</div>
						</div>
					</div>
				</form>
			</div>
				<?php
			}
		?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../SISCO/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../SISCO/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../SISCO/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../SISCO/dist/js/sb-admin-2.js"></script>

	

</body>

</html>
