<?php
	session_start();
	if(!$_SESSION['login_sisco'] || $_SESSION['priv_sisco'] != "ROOT")
	{
		header("Location: index.php?problem=notLoggedIn");
		exit;
	}
	$name = $_SESSION['name_sisco'];
	
	include('connectDB.php');
	
	// check if the 'ID' variable is set in URL, and check that it is valid
	if (isset($_GET['ID']))
	{
		// get ID value
		$ID = $_GET['ID'];
		
		// delete the entry
		$result = mysql_query("DELETE FROM PROGRAM WHERE PR_ID = '$ID'")
		or die(mysql_error()); 
		
		// check for deletion
		if ($result)
		{
		   echo '<html>
					<head>
						<script>
							window.alert("Program berjaya di padam!");
						</script>
						<meta http-equiv="refresh" content="0; url=../SISCO/tadbir_program.php" />
					</head>
				</html>';
		}
		else
		{
			echo "SQL insert statement failed.<br>" . mysql_error();
			echo '<html>
					<head>
						<script>
							window.alert("Program gagal di padam!");
							window.history.go(-1);
						</script>
					</head>
				</html>';
		}
		
		// redirect back to the view page
		echo '<html><script>window.history.go(-2)</script></html>';
	}
	else
	// if ID isn't set, or isn't valid, redirect back to view page
	{
		echo '<html><script>window.history.go(-1)</script></html>';
	} 
?>