<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Creational\FactoryMethod\Log\Log;

class Test
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Log();
    }

    public function run()
    {
        $this->logger->log('Hello World!');
    }
}

$test = new Test();
$test->run();
