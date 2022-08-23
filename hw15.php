<?php

class Logger
{

    private $format;
    private $delivery;

    protected Deliver $deliver;
    protected LogFormat $logFormat;

    public function __construct($logFormat, $deliver)
    {
        $this->format = $this->format($logFormat);
        $this->delivery = $this->deliver($deliver);
    }

    public function log(string $string): string
    {
        return $this->deliver->getDeliveryType($this->logFormat->getFormat($string));
    }

    public function format(LogFormat $type): LogFormat
    {
        return $this->logFormat = $type;
    }

    public function deliver(Deliver $deliver): Deliver
    {
        return $this->deliver = $deliver;
    }
}

interface LogFormat
{
    public function getFormat(string $string): string;
}

class Raw implements LogFormat
{
    public function getFormat($string): string
    {
        return $string;
    }
}

class WithDate implements LogFormat
{
    public function getFormat($string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class WithDateAndDetails implements LogFormat
{
    public function getFormat($string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

interface Deliver
{
    public function getDeliveryType(string $string): string;
}

class byEmail implements Deliver
{
    public function getDeliveryType(string $string): string
    {
        return "Вывод формата ({$string}) по имейл";
    }
}

class bySms implements Deliver
{
    public function getDeliveryType(string $string): string
    {
        return "Вывод формата ({$string}) в смс";
    }
}

class byConsole implements Deliver
{
    public function getDeliveryType(string $string): string
    {
        return "Вывод формата ({$string}) в консоль";
    }
}

$logger = new Logger(new WithDateAndDetails(), new bySms());
$logger->format(new WithDateAndDetails());
$logger->deliver(new bySms());
echo $logger->log('test');
