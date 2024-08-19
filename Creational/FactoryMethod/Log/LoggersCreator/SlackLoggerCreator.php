<?php

namespace Creational\FactoryMethod\Log\LoggersCreator;
use Creational\FactoryMethod\Log\Loggers\SlackLogger;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class SlackLoggerCreator extends LoggerCreator
{
    private $webhook;

    public function __construct()
    {
        $config = require __DIR__ . '/../loggingConfig.php';
        $this->webhook = $config['channels']['slack']['webhook_url'];
    }

    protected function formatMessage(string $message): string
    {
        return "INFO " . time() . ": " . $message . "\n";
    }

    public function getLogger(): ILogger
    {
        return new SlackLogger($this->webhook);
    }
}