<?php

function get_db_connection(): mysqli
{
    $host = getenv('DB_HOST') ?: 'db';
    $user = getenv('DB_USER') ?: 'appuser';
    $password = getenv('DB_PASS') ?: 'apppass';
    $database = getenv('DB_NAME') ?: 'sp-rl';
    $port = intval(getenv('DB_PORT') ?: 3306);

    $mysqli = @new mysqli($host, $user, $password, $database, $port);
    if ($mysqli->connect_errno) {
        error_log('DB connect error: host=' . $host . ' user=' . $user . ' db=' . $database . ' port=' . $port . ' error=' . $mysqli->connect_error);
        throw new RuntimeException('Falha na ligação à base de dados.');
    }

    $mysqli->set_charset('utf8mb4');
    return $mysqli;
}
