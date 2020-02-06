<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISCO</title>
	
	<link rel="shortcut icon" href="unitkor.ico">

    <!-- Bootstrap Core CSS -->
    <link href="../SISCO/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../SISCO/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../SISCO/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../SISCO/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- SISCO -->
	


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<SCRIPT LANGUAGE="JavaScript">
		function NewWindow(mypage, myname, w, h, scroll) {
		var winl = (screen.width - w) / 2;
		var wint = (screen.height - h) / 2;
		winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable=no'
		win = window.open(mypage, myname, winprops)
		if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
		}
	</script>
	
	<script type="text/javascript" src="/jsencryption.js"></script>
	
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
                <a class="navbar-brand" href="index.php">Sistem SISCO</a>
            </div>
            <!-- /.navbar-header -->

           
            <!-- /.navbar-top-links -->
			
			<!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
							<!-- HOME -->
                            <a class="active" href="index.php"><i class="fa fa-home fa-fw"></i> Sistem SISCO </a>
                        </li>
                        <li>
							<!-- Register -->
                            <a target="_blank" href="daftar_masuk.php"><i class="fa fa-sign-in fa-fw"></i> Daftar Masuk </a>
                        </li>
						<li>
							<!-- Register -->
                            <a href="keputusan.php"><i class="fa fa-envelope fa-fw"></i> Keputusan Kor </a>
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
                        <h1 class="page-header">Sistem SISCO</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							Selamat Datang ke <b>Sistem Kokurikulum UiTM Cawangan Johor!</b>
						</div>
							   
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<b>Makluman</b>
							</div>
							<!-- .panel-heading -->
							<div class="panel-body">
								<div class="panel-group" id="accordion">
									<?php
									
										
										//connect to MySQL database server
										include('connectDB.php');

										$query = "SELECT * FROM ANNOUNCEMENTS ORDER BY ANN_TIME"; 
										$result = mysql_query($query) or die(mysql_error());

										while($row = mysql_fetch_array($result))
										{
											?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion"><?php print($row['ANN_TITLE']); ?></a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														<pre><?php print($row['ANN_CONTENT'] . "</pre>" . "<b>Oleh : </b>" . $row['ANN_AUTH']); ?>
														<th>(<?php print($row['ANN_TIME']); ?>)</th>
													</div>
												</div>
											</div>
											<br>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- .panel-body -->
						</div>
						<!-- /.panel -->
					</div>
                <!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../SISCO/dist/js/sb-admin-2.js"></script>

</body>

</html>
