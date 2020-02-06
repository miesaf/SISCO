<html>
	<body>
		<?php
			session_start();
			if((!$_SESSION['login_sisco']) || ($_SESSION['priv_sisco'] != "ROOT"))
			{
				header("Location: daftar_masuk.php?problem=notLoggedIn");
				exit;
			}
			$name = $_SESSION['name_sisco'];
			
			include('connectDB.php');
			
			// check if the 'ID' variable is set in URL, and check that it is valid
			if (isset($_GET['ID']) && is_numeric($_GET['ID']))
			{
				// get ID value
				$ID = $_GET['ID'];
				?>
					<script language="JavaScript">
						var del = confirm("Adakah anda pasti untuk memadam akaun ini?");
						if (del == true)
						{
							window.location.assign("padam_pentadbir.php?ID=<?php print($ID); ?>");
						} else 
						{
							alert("Akaun tidak di padam.");
							window.location.assign("senarai_pentadbir.php");
						}
					</script>
				<?php
			}
			else
			// if ID isn't set, or isn't valid, redirect back to view page
			{
				echo '<html><script>window.history.go(-1)</script></html>';
			} 
		?>
	</body>
</html>