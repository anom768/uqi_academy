<?php

function getDatabaseConfig(): array
{
    $username = "root";
    $password = "";
    $db_name = "uqi_academy_test";
    $cloud_sql_connection_name = getenv("CLOUD_SQL_CONNECTION_NAME");
    $socket_dir = getenv("DB_SOCKET_DIR") ?: "/cloudsql";

    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=uqi_academy_test",
                "username" => $username,
                "password" => $password
            ],
            "prod" => [
                "url" => sprintf("mysql:dbname=%s;unix_socket=%s/%s", $db_name, $socket_dir, $cloud_sql_connection_name),
                "username" => $username,
                "password" => $password
            ]
        ]
    ];
}
