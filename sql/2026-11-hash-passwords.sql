-- 2026-11 PHP 8.5 port: passwords are stored with password_hash(), which needs more than 20 characters.
-- Run once, then run tools/hash-passwords.php to hash the existing plain-text passwords.
ALTER TABLE ADMINISTRATOR MODIFY SA_PW varchar(255) NOT NULL;
