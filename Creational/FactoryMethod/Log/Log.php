<?php

namespace Creational\FactoryMethod\Log;

use Creational\FactoryMethod\Log\LoggersCreator\FileLoggerCreator;
use Creational\FactoryMethod\Log\LoggersCreator\SlackLoggerCreator;
use Creational\FactoryMethod\Log\LoggersCreator\SysLoggerCreator;

class Log
{
    private $loggers = [];
    private $channels;
    private $config;

    public function __construct($channels = [])
    {
        $this->config = require_once __DIR__ . '/loggingConfig.php';
        $this->channels = is_array($channels) ? $channels : explode(',', $channels);
        $this->getLoggers();
    }

    public function log($message)
    {
        foreach ($this->loggers as $logger) {
            $logger->log($message);
        }
    }

    private function getLoggers()
    {
        if (empty($this->loggers)) {
            $this->setLogger();
        }
    }

    private function setLogger()
    {
        if (empty($this->channels)) {
            $this->channels = is_array($this->config['default']) ? $this->config['default'] : explode(',', $this->config['default']);
        }

        if (in_array('stack', $this->channels)) {
            $this->channels = array_merge($this->channels, $this->config['channels']['stack']['channels']);
        }

        $this->channels = array_unique($this->channels);

        foreach ($this->channels as $channel) {
            switch ($channel) {
                case 'file':
                    $this->loggers[$channel] = new FileLoggerCreator();
                    break;
                case 'syslog':
                    $this->loggers[$channel] = new SysLoggerCreator();
                    break;
                case 'slack':
                    $this->loggers[$channel] = new SlackLoggerCreator();
                    break;
                default:
                    break;
            }
        }
    }
}