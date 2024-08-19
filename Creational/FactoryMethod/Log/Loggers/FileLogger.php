<?php

namespace Creational\FactoryMethod\Log\Loggers;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class FileLogger implements ILogger
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message): void
    {
        file_put_contents($this->filePath, $message);
        echo "FileLogger: log message: $message\n";
    }
}