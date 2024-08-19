<?php

namespace Creational\FactoryMethod\Log\LoggersCreator;
use Creational\FactoryMethod\Log\Loggers\FileLogger;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class FileLoggerCreator extends LoggerCreator
{
    private $filePath;

    public function __construct()
    {
        $config = require __DIR__ . '/../loggingConfig.php';
        $this->filePath = $config['channels']['file']['path'];
    }

    protected function formatMessage(string $message): string
    {
        return "INFO " . time() . ": " . $message . "\n";
    }

    public function getLogger(): ILogger
    {
        return new FileLogger($this->filePath);
    }
}