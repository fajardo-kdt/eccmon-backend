<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected function loadEnvironmentFromDomain()
    {
        $domain = request()->getHost();

        switch($domain) {
            case 'http://localhost:3000';
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
