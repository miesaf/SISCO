<?php
	session_start();
	
	$enteredID	= $_POST['uname'];
	$enteredIC	= $_POST['pword'];
	
	include('connectDB.php');
	
	//SQL query command
	$sql="SELECT * FROM ADMINISTRATOR";
	$res_sql = mysql_query($sql) or die("SQL select statement failed");
	// execute query
	
	while ($row = mysql_fetch_array($res_sql))
	{
		// extract specific fields
		$NO_MATRIK	= $row["SA_ID"];
		$KATA_LALUAN= $row["SA_PW"];
		$NAMA		= $row["SA_NAME"];
		$JENIS		= $row["SA_TYPE"];

		if($enteredID == $NO_MATRIK && $enteredIC == $KATA_LALUAN)
		{
			$_SESSION['login_sisco']	= "YES";
			$_SESSION['name_sisco']		= $NAMA;
			$_SESSION['priv_sisco']		= $JENIS;
			$_SESSION['ident_sisco'] 	= $NO_MATRIK;
			
			$url = "Location: utama.php";
			header($url);
			exit;
		}
		
		$problem = "";
		if($enteredID == $NO_MATRIK && $enteredIC != $KATA_LALUAN)
		{
			$problem = "invalidPassword";
		}
		if($enteredID != $NO_MATRIK)
		{
			$problem = "invalidUser";
		}
	}
	
	$url = "Location: daftar_masuk.php?problem=$problem";
	header($url);
	exit;
?>