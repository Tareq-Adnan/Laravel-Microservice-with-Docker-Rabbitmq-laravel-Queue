<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

try {
    $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest', '/');
    
    echo 'Connection successful!';
    
    $connection->close();
} catch (\Exception $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
