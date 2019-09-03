<?php


namespace MarmaNik\Sms\Contracts;


interface Driver
{
    public function send(string $msisdn, string $msg);

    public function sendWhatsApp(string $msisdn, string $msg);

    public function getDriver(): string;
}