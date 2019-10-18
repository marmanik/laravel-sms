<?php


namespace MarmaNik\Sms\Drivers;

use MarmaNik\Sms\Contracts\Driver;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client as TwilioClient;

/**
 * Driver for Twilio.
 */
class Twilio implements Driver
{
    protected $client;
    protected $from;

    public function __construct($config)
    {
        try {
            $this->client = new TwilioClient($config['twilio_sid'], $config['twilio_token']);
            $this->from = $config['twilio_from'];
        } catch (ConfigurationException $e) {
            Log::error($e);
        }
    }


    public function send(string $msisdn, string $msg)
    {
        return  $this->client->messages->create(
            $msisdn,
            [
                'from' => $this->from,
                'body' => $msg,
            ]
        );
    }


    /**
     * Get driver name.
     *
     * @return string
     */
    public function getDriver(): string
    {
        return 'Twilio';
    }

    public function sendWhatsApp(string $msisdn, string $msg)
    {
        // TODO: Implement sendWhatsApp() method.
    }
}
