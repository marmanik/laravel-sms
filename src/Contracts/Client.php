<?php


namespace MarmaNik\Sms\Contracts;


/**
 * SMS client.
 */
interface Client
{
    /**
     * Get the driver name.
     *
     * @return string
     */
    public function getDriver(): string;

    /**
     * Send the message.
     *
     * @param string $msisdn
     * @param string $msg The message array.
     *
     * @return mixed
     */
    public function send(string $msisdn, string $msg);
}