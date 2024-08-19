<?php

namespace Creational\FactoryMethod\Log\Loggers;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class SlackLogger implements ILogger
{
    private string $webhookUrl;

    public function __construct($webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
    }

    public function log(string $message): void
    {
        echo "Slack: log message: $message\n";
    }
}