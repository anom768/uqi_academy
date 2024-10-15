<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=uqi_academy_test",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=uqi_academy",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
