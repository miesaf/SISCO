<?php
	// Database connection. The credentials live in config.php (not in git); copy config.example.php to start.
	mysqli_report(MYSQLI_REPORT_OFF);

	$sisco_config = require __DIR__ . '/config.php';
	$condb = mysqli_connect($sisco_config['db_host'], $sisco_config['db_user'], $sisco_config['db_pass'], $sisco_config['db_name']);
	unset($sisco_config);

	if (!$condb)
	{
		http_response_code(500);
		die("Sambungan ke pangkalan data gagal.");
	}

	// The 2015 code relies on MySQL's non-strict mode (empty strings in numeric columns, columns without defaults).
	mysqli_query($condb, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");

	// Runs a prepared statement: a mysqli_result for SELECT, true or false otherwise.
	function db_query(string $sql, array $params = [])
	{
		global $condb;
		return mysqli_execute_query($condb, $sql, $params);
	}

	// Escapes a value for HTML output.
	function e($value): string
	{
		return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	}
?>
