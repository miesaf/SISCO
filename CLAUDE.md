# CLAUDE.md

Project memory for Claude Code. Keep it short and current. This repo is **public**: never commit credentials, server
addresses, account names or database names. The hosting details live in the owner's private notes.

## What this is

**SISCO — Sistem Kokurikulum UiTM Cawangan Johor.** A CSC318 (Web Application Development) group assignment from the
Dec 2014 – Apr 2015 semester (CS110, UiTM Johor, Segamat campus): native PHP pages on the SB Admin 2 theme with a MySQL
database. It is an **archived project**, not a live system. Its data is from 2015.

- Live copy: **https://app.dimensikini.xyz/SISCO/**, entry 11 in the owner's project archive ("Server Arkib Projek
  Dimensi Kini"). The other archived projects there run unchanged on PHP 7.4; SISCO alone runs on **PHP 8.5** through its
  own `.htaccess` (`SetHandler application/x-lsphp85`).
- History: first hosted at `dimensikini.xyz/SISCO` (mysql_* code, then the mysqli version of 2020-08-02, PHP 7.4).
  Moved to app.dimensikini.xyz and ported to PHP 8.5 on 2026-11-24 (PR #1; ClickUp `86d4dhmfn`). The old URL
  301-redirects to the new one. SISCO is **not** part of PRISKOR or JCIS.

## Features

- Login for administrators (`ROOT`) and trainers (`TRNR`) against `ADMINISTRATOR`; change password (`tukar_kl.php`).
- Students, trainers and administrators: register / edit / delete / list / detail (`daftar_*`, `pinda_*`, `padam_*`,
  `senarai_*`, `rincian_*`).
- Reference data: co-curricular courses (`tadbir_kursus.php`, `pinda_kursus.php`) and academic programmes
  (`tadbir_program.php`).
- Announcements: `tambah_makluman.php`, `sunting_makluman.php`, `senarai_makluman.php`; shown on `index.php`.
- Marks: a trainer enters field (/20) and exam (/80) marks for their own course and platoon (`markah.php`,
  `pinda_markah.php`). Public results lookup by matric + IC number: `keputusan.php`.

Tables: `ADMINISTRATOR`, `ANNOUNCEMENTS`, `COURSE`, `PROGRAM`, `STUDENT`, `TRAINER` (`sql/sisco_db_structure.sql`).
The data holds real personal details (IC numbers, addresses, health notes, bank accounts): never copy it into the repo,
an issue or a public place.

## Code conventions (2026 port — keep them)

- `connectDB.php` reads `config.php` (git-ignored; copy `config.example.php`). It sets `mysqli_report(MYSQLI_REPORT_OFF)`
  so the old `if ($exe_sql) … else …` flows work, and a non-strict `sql_mode` the 2015 code relies on.
- Every query goes through `db_query($sql, [$params])` (prepared statements, `mysqli_execute_query`). Never interpolate
  request data into SQL.
- Escape output with `e()`. Pages start with `<?php ob_start(); ?>` so `session_start()` and `header()` work after HTML.
- Passwords: `password_hash()` / `password_verify()`. `checkLogin.php` still accepts a plain-text password and re-hashes
  it on first login; an empty password field on the admin edit form keeps the current one.
- Pages link to `../SISCO/...`, so the folder must be served as `/SISCO`.
- `.htaccess` denies `config*.php`, `connectDB.php`, `sql/`, `tools/`, `*.md`, logs.
- UI text is Malay; code comments, commits and docs are English. No AI attribution in commits or PRs.

## Local test

PHP 8.5 with mysqli and a local MariaDB (the owner uses EnvKit). Import a dump into a local DB, then run
`sql/2026-11-hash-passwords.sql` and `php tools/hash-passwords.php`. Serve the **parent** of a folder named `SISCO`
(a symlink works) with `php -d display_errors=1 -d error_reporting=-1 -S 127.0.0.1:8126 -t <parent>` and open
`/SISCO/`. The built-in server ignores `.htaccess`, so check the deny rules on the real host.

## Deploy

There is no git on the host. Upload `master` with `git archive master | ssh … 'tar -x -C …/public_html/SISCO'`;
`config.php` (mode 600) stays on the server and is never overwritten. Schema changes go in `sql/` and are run by hand.
Every change on the server needs the owner's OK: show the exact commands first. Smoke test after a deploy: the pages
answer 200 on PHP 8.5, and `config.php`, `connectDB.php`, `sql/`, `tools/` answer 403.
