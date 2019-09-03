<?php


namespace MarmaNik\Sms;


use MarmaNik\Sms\SmsManager;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->mergeConfigFrom($this->configPath(), 'sms');

        $this->app->singleton('sms', function ($app) {

            return new SmsManager($app);
        });

    }
    protected function configPath()
    {
        return __DIR__ . '/config/sms.php';
    }
}