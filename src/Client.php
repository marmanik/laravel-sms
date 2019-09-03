<?php


namespace MarmaNik\Sms;

use MarmaNik\Sms\Contracts\Client as ClientContract;
use MarmaNik\Sms\Contracts\Driver;

/**
 * SMS client.
 */
class Client implements ClientContract
{
    /**
     * Driver to use.
     *
     * @var
     */
    private $driver;

    /**
     * Constructor.
     *
     * @param Driver $driver The driver to use.
     *
     * @return void
     */
    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }
    /**
     * Get the driver name.
     *
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver->getDriver();
    }

    /**
     * Send the message.
     *
     * @param string $msisdn
     * @param string $msg The message array.
     *
     * @return mixed
     */
    public function send(string $msisdn, string $msg)
    {
        return $this->driver->send($msisdn, $msg);
    }
}