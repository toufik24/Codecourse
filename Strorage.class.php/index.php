<?php

require __DIR__ . '/app/bootstrap.php';

$store = new \App\Storage\SessionStorage;

$store->set('name', 'Mo');
$store->set('age', 20);

var_dump($store->all());
