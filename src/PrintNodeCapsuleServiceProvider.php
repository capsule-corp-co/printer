<?php
namespace CapsuleCorp\Printer;

use Illuminate\Support\ServiceProvider;

class PrintNodeCapsuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('capsulecorp-printer', function () {
            return new PrintNodeCapsule;
        });
        $this->mergeConfigFrom(
            __DIR__ . '/config.php',
            'capsulecorp-printer-config'
        );
    }
}
