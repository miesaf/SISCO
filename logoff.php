<?php
	session_start();
	$name = $_SESSION['name_sisco'];
	unset($_SESSION['login_sisco']);
	unset($_SESSION['name_sisco']);
	unset($_SESSION['priv_sisco']);
	unset($_SESSION['ident_sisco']);
	// session_destroy();
	// header("Location: goodbye.php?");	
	/* goodbye.php?name=$name -->
	goodbye.php -->
	head -->
	<?php $name = $_GET['name']; ?> -->
	Goodbye, <?php echo $name; ?> */
?>
<html>
<head>
	<link rel="shortcut icon" href="unitkor.ico">
	<script>
		window.alert("Anda telah mendaftar keluar dari sistem!\nTerima kasih kerana menggunakan sistem ini.");
	</script>
	<!-- 8888888888888888888888888888888888888
	<?php
		// $name = $_GET['name'];
	?>
	8888888888888888888888888888888888888 -->
</head>
<body>
		<!--<h1> Goodbye</h1>-->
		<meta http-equiv="refresh" content="0; url=../SISCO/daftar_masuk.php" />
</body>
</html>