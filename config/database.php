<?php
/**
 * Koneksi database terpusat.
 *
 * Set variabel berikut di environment server:
 * DB_HOST, DB_USER, DB_PASS, DB_NAME.
 */
mysqli_report(MYSQLI_REPORT_OFF);

$host = getenv('DB_HOST') ?: '127.0.0.1';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';
$database = getenv('DB_NAME') ?: 'mohjasin_dulur';

$mysqli = mysqli_connect($host, $username, $password, $database);

if (!$mysqli) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(503);
    exit('Layanan database sedang tidak tersedia.');
}

if (!mysqli_set_charset($mysqli, 'utf8mb4')) {
    error_log('Unable to set database charset: ' . mysqli_error($mysqli));
}