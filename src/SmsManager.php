<?php


namespace MarmaNik\Sms;

use MarmaNik\Sms\Contracts\Driver;
use MarmaNik\Sms\Drivers\MessageBird;
use MarmaNik\Sms\Drivers\Nexmo;
use MarmaNik\Sms\Drivers\Twilio;
use Illuminate\Support\Manager;

class SmsManager extends Manager
{

    protected function createTwilioDriver()
    {
        $driver = new Twilio($this->app['config']['sms.twilio']);

        return $this->buildSmsClient($driver);

    }

    protected function createMessageBirdDriver()
    {
        $driver = new MessageBird($this->app['config']['sms.messagebird']);

        return $this->buildSmsClient($driver);
    }

    protected function createNexmoDriver()
    {
        $driver = new Nexmo($this->app['config']['sms.nexmo']);

        return $this->buildSmsClient($driver);
    }


    protected function buildSmsClient(Driver $driver)
    {
        return new Client($driver);
    }


    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['sms.driver'];
    }
}