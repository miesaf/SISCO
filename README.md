**Sistem Kokurikulum UiTM Cawangan Johor (SISCO)**
=====================

## Note

**This is a project required for `CSC318 - Web Application Development` course under `CS110 - Diploma in Computer Science` program at `MARA University of Technology Johore Branch Segamat Campus`.**

## Group Particulars

Class : `JCS1104I`<br/>
Semester : `Disember 2014 - April 2015`

## Group Members

- Muhamad Zulhilmi Bin Raizuddin
- Muhamad Amirul Ikhmal Bin Azman
- Amar Ashraf
- Muhammad Syahiruddin Bin Ismail

## Hosted Project

The project is archived at [https://app.dimensikini.xyz/SISCO/](https://app.dimensikini.xyz/SISCO/).

## Running it (PHP 8.5, 2026 port)

The 2015 code was ported to PHP 8.5 in November 2026: every query is a prepared statement (`db_query()` in
`connectDB.php`), passwords are stored with `password_hash()`, and output is escaped with `e()`.

1. Copy `config.example.php` to `config.php` (git-ignored) and fill in the database credentials.
2. Import `sql/sisco_db_structure.sql` (or a dump of the old database), then run `sql/2026-11-hash-passwords.sql`.
3. Run `php tools/hash-passwords.php` once to hash passwords that are still in plain text.
4. Serve the folder as `/SISCO` (pages link to `../SISCO/...`). `.htaccess` pins it to PHP 8.5 on LiteSpeed
   (`x-lsphp85`) and denies `config.php`, `sql/`, `tools/` and logs.
