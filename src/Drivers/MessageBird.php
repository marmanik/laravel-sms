<?php


namespace MarmaNik\Sms\Drivers;


use MarmaNik\Sms\Contracts\Driver;
use MessageBird\Client as MessageBirdClient;
use MessageBird\Objects\Message;

class MessageBird implements Driver
{

    protected $client;
    protected $from;

    public function __construct($config)
    {
        $this->client = new MessageBirdClient($config['api_key']);
        $this->from = $config['originator'];

    }

    public function send(string $msisdn, string $msg)
    {
        $message = new Message();
        $message->originator = $this->from;
        $message->recipients = [ $msisdn ];
        $message->body = $msg;

        return $this->client->messages->create($message);
    }

    public function getDriver(): string
    {
        return 'MessageBird';
    }

    public function sendWhatsApp(string $msisdn, string $msg)
    {
        // TODO: Implement sendWhatsApp() method.
    }
}