<?php
	session_start();

	$enteredID	= (string) ($_POST['uname'] ?? '');
	$enteredPW	= (string) ($_POST['pword'] ?? '');

	require_once __DIR__ . '/connectDB.php';

	$res_sql = db_query("SELECT SA_ID, SA_PW, SA_NAME, SA_TYPE FROM ADMINISTRATOR WHERE SA_ID = ?", [$enteredID]) or die("SQL select statement failed");
	$row = mysqli_fetch_array($res_sql);

	if (!$row)
	{
		header("Location: daftar_masuk.php?problem=invalidUser");
		exit;
	}

	$stored = $row["SA_PW"];
	$hashed = password_get_info($stored)['algo'] !== null;
	$valid	= $hashed ? password_verify($enteredPW, $stored) : hash_equals($stored, $enteredPW);

	if (!$valid)
	{
		header("Location: daftar_masuk.php?problem=invalidPassword");
		exit;
	}

	// A password still in plain text (tools/hash-passwords.php not run yet) is hashed on its first login.
	if (!$hashed || password_needs_rehash($stored, PASSWORD_DEFAULT))
	{
		db_query("UPDATE ADMINISTRATOR SET SA_PW = ? WHERE SA_ID = ?", [password_hash($enteredPW, PASSWORD_DEFAULT), $row["SA_ID"]]);
	}

	session_regenerate_id(true);
	$_SESSION['login_sisco']	= "YES";
	$_SESSION['name_sisco']		= $row["SA_NAME"];
	$_SESSION['priv_sisco']		= $row["SA_TYPE"];
	$_SESSION['ident_sisco']	= $row["SA_ID"];

	header("Location: utama.php");
	exit;
?>
