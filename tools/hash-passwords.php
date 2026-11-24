<?php
// One-time: hashes every plain-text password in ADMINISTRATOR. Run from the SISCO folder after
// sql/2026-11-hash-passwords.sql:  php tools/hash-passwords.php
if (PHP_SAPI !== 'cli') {
	http_response_code(404);
	exit;
}

require __DIR__ . '/../connectDB.php';

$rows = db_query("SELECT SA_ID, SA_PW FROM ADMINISTRATOR");
$hashed = 0;
$skipped = 0;
foreach (mysqli_fetch_all($rows, MYSQLI_ASSOC) as $row) {
	if (password_get_info($row['SA_PW'])['algo'] !== null) {
		$skipped++;
		continue;
	}
	db_query("UPDATE ADMINISTRATOR SET SA_PW = ? WHERE SA_ID = ?", [password_hash($row['SA_PW'], PASSWORD_DEFAULT), $row['SA_ID']]);
	$hashed++;
}

echo "Hashed: $hashed, already hashed: $skipped\n";
