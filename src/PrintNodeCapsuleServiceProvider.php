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
        $this->publishes([
            __DIR__ . '/config/capsulecorp-printnode.php' => config_path('capsulecorp-printnode.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('capsulecorp-printnodecapsule', function () {
            return new PrintNodeCapsule;
        });
    }
}
