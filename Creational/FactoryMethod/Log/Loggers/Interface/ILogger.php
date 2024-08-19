<?php

namespace Creational\FactoryMethod\Log\Loggers\Interface;

interface ILogger
{
    public function log(string $message): void;
}