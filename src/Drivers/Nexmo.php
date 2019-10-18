<?php


namespace MarmaNik\Sms\Drivers;


use MarmaNik\Sms\Contracts\Driver;
use Nexmo\Client as NexmoClient;
use Nexmo\Client\Credentials\Basic as NexmoCredentialsBasic;

class Nexmo implements Driver
{

    protected $client;
    protected $from;

    public function __construct($config)
    {
        $nexmoCredentialsBasic = new NexmoCredentialsBasic($config['nexmo_api_key'], $config['nexmo_secret']);

        $this->client = new NexmoClient($nexmoCredentialsBasic);

        $this->from = $config['nexmo_from'];
    }

    public function send(string $msisdn, string $msg)
    {

       $message = $this->client->message()->send([
            'to' => $msisdn,
            'from' => $this->from,
            'text' => $msg
        ]);

        $response = $message->getResponseData();

        return $response;
    }

    public function getDriver(): string
    {
        return 'Nexmo';
    }

    public function sendWhatsApp(string $msisdn, string $msg)
    {
        // TODO: Implement sendWhatsApp() method.
    }
}