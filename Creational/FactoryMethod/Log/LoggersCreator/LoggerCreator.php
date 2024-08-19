<?php

namespace Creational\FactoryMethod\Log\LoggersCreator;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

abstract class LoggerCreator
{
    protected $format;
    abstract public function getLogger(): ILogger;
    abstract protected function formatMessage(string $message): string;

    public function log(string $message): void
    {
        $logger = $this->getLogger();
        $message = $this->formatMessage($message);
        $logger->log($message);
    }
}