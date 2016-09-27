<?php

require 'app/bootstrap.php';

$capture = new \Codecourse\Capture\Capture;

$capture->load('invoice.php', [
    'order' => '123456',
    'name' => 'Dale Garrett',
    'amount' => 49.69,
]);

$capture->respond('invoice.pdf');
