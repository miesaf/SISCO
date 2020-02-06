<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-28892771-1']);
	_gaq.push(['_trackPageview']);

	(function()
	{
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://10.0.20.1/nsp/support/?key=faq -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>[SISCO] - Tukar Kata Laluan</title>
	<link rel="shortcut icon" href="unitkor.ico">
	<?php
		session_start();
		if(!$_SESSION['login_sisco'])
		{
			header("Location: index.php?problem=notLoggedIn");
			exit;
		}
	?>
	<!-- Stylesheet -->
	<link href="../SISCO/style.css" rel="stylesheet" type="text/css">
	<link href="../SISCO/ddsmoothmenu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<br>
	<br>
	<div align="center">
	<?php
		include('connectDB.php');
		if(isset($_POST['telah']))
		{
			// Variables from
			$PAS1		= $_POST['pass_baru1'];
			$PAS2		= $_POST['pass_baru2'];
			$SET_ID		= $_SESSION['ident_sisco'];
			
			if($PAS1 == $PAS2)
			{
				//SQL query command
				$sql="UPDATE ADMINISTRATOR SET SA_PW = '$PAS1' WHERE SA_ID = '$SET_ID'";
				
				// execute query
				$exe_sql = mysql_query($sql);
				
				// confirming the record is added
				if ($exe_sql)
				{
					echo '<html>
							<head>
								<script>
									window.alert("Kata laluan berjaya dipinda!");
								</script>
								<meta http-equiv="refresh" content="0; url=utama.php" />
							</head>
						</html>';
				}
				else
				{
					echo "SQL statement failed.<br>" . mysql_error();
					echo '<html>
							<head>
								<script>
									window.alert("Kata laluan gagal dipinda!\nSila hubungi pentadbir sistem.");
								</script>
								<meta http-equiv="refresh" content="0; url=utama.php" />
							</head>
						</html>';
				}
			}
			else
			{
				echo '<html>
							<head>
								<script>
									window.alert("Kata laluan gagal dipinda!\nKata laluan tidak padan.");
									window.history.go(-1);
								</script>
							</head>
						</html>';
			}
		}
		else
		{
	?>
		<form id="form1" name="form1" method="post" action="tukar_kl.php">
		<input type="hidden" name="telah" value=true>
			<table style="BORDER-COLLAPSE: collapse" bordercolor="#cccccc" cellspacing="0" cellpadding="0" width="600" border="1">
				<tbody>
					<tr>
						<td height="24" background="../SISCO/images/1_background_table.gif" >
							<div align="center">Sistem SISCO - Tukar Kata Laluan</div>
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div align="center">
								<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#cccccc" style="BORDER-COLLAPSE: collapse">
								<tbody>
									<tr>
										<td width="49%" >
											<div align="right">Kata Laluan Baru :</div>
										</td>
										<td width="51%" bgcolor="#CCCCCC" >
											<span class="collection">
											<input type="password" name="pass_baru1" id="pass_baru1" value="" maxlength="30" class="" style="WIDTH: 180px; HEIGHT: 22px" />
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<div align="right"> Taip Semula Kata Laluan Baru :</div>
										</td>
										<td bgcolor="#CCCCCC" >
											<div align="left">
											<span class="collection">
											<input type="password" name="pass_baru2" id="pass_baru2" value="" maxlength="30" class="" style="WIDTH: 180px; HEIGHT: 22px" />
											</span>&nbsp;
											</div>
										</td>
									</tr>
									<tr valign="top">
										<td colspan="2">
											<div align="center">
												<br />
												<input name="Submit" type="submit" style="WIDTH: 140px; HEIGHT: 22px" value="Tukar Kata Laluan" />
												<br />
												<br />
											</div>
										</td>
									</tr>
								</tbody>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form> 
		<?php
		}
		?>
	</div>
</body>
</html>