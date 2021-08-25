<?php

require_once("Query.php");

$url = "https://superposuda.retailcrm.ru/api/v5/orders/create";
$apiKey = "QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb";
$query = new Query($url, $apiKey);

$params = [
    "site" => "test",
    "order" => [
        "status" => "trouble",
        "orderType" => "fizik",
        "orderMethod" => "test",
        "number" => "4022001",
        "lastName" => "Tinishov",
        "firstName" => "Vladislav",
        "patronymic" => "Petrovich",
        "customFields" => [
            "prim" => "тестовое задание",
        ],
        "customerComment" => "https://github.com/vladtinishov/TestEx",
        "items" => [
            "productName" => "Маникюрный набор AZ105R Azalita",
        ],

    ],
];

$result = $query->createQuery($params);

var_dump($result);