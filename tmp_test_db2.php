<?php
require "/var/www/html/include/db.php";
try {
    $m = get_db_connection();
    echo "CONNECT_OK
";
    $queries = [
        "SELECT DATABASE() AS db",
        "SHOW TABLES FROM spirl",
        "SHOW TABLES FROM spirl LIKE 'Utilizador'",
        "SHOW TABLES FROM spirl LIKE 'utilizador'",
        "SELECT table_name FROM information_schema.tables WHERE table_schema='spirl' ORDER BY table_name LIMIT 100",
    ];
    foreach ($queries as $q) {
        echo "QUERY: $q
";
        $res = $m->query($q);
        if ($res === false) {
            echo "ERROR: " . $m->error . "
";
            continue;
        }
        while ($row = $res->fetch_row()) {
            echo implode('|', $row) . "
";
        }
        $res->free();
    }
    $m->close();
} catch (Throwable $e) {
    echo "ERR: " . $e->getMessage() . "
";
}
?>