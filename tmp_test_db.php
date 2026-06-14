<?php
require __DIR__ . "/include/db.php";
try {
    $mysqli = get_db_connection();
    echo "CONNECT_OK
";
    $res = $mysqli->query("SELECT DATABASE()");
    if ($res === false) { echo "DB_QUERY_ERR: " . $mysqli->error . "
"; exit(1); }
    $row = $res->fetch_row();
    echo "DB=" . ($row[0] ?? '(none)') . "
";
    $res->free();
    $queries = [
        "SHOW TABLES FROM spirl",
        "SHOW TABLES FROM spirl LIKE 'Utilizador'",
        "SHOW TABLES FROM spirl LIKE 'utilizador'",
        "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='spirl' AND table_name='Utilizador'",
        "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='spirl' AND table_name='utilizador'",
    ];
    foreach ($queries as $query) {
        echo "QUERY=" . $query . "
";
        $r = $mysqli->query($query);
        if ($r === false) {
            echo "ERROR: " . $mysqli->error . "
";
            continue;
        }
        while ($row = $r->fetch_row()) {
            echo implode('|', $row) . "
";
        }
        $r->free();
    }
    $mysqli->close();
} catch (Throwable $e) {
    echo "ERR: " . $e->getMessage() . "
";
}
?>