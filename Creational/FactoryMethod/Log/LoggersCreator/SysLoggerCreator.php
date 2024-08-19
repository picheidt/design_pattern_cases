<?php

namespace Creational\FactoryMethod\Log\LoggersCreator;
use Creational\FactoryMethod\Log\Loggers\SysLogger;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class SysLoggerCreator extends LoggerCreator
{
    protected function formatMessage(string $message): string
    {
        return "INFO " . time() . ": " . $message . "\n";
    }

    public function getLogger(): ILogger
    {
        return new SysLogger();
    }
}