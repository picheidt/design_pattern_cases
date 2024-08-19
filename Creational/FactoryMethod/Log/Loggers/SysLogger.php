<?php

namespace Creational\FactoryMethod\Log\Loggers;
use Creational\FactoryMethod\Log\Loggers\Interface\ILogger;

class SysLogger implements ILogger
{
    public function log(string $message): void
    {
        syslog(LOG_INFO, $message);
        echo "Syslog: log message: $message\n";
    }
}