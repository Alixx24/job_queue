<?php

namespace App\Providers;

use App\Jobs\SendReminderEmail;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // SendReminderEmail::after(function (JobProcessed $event) {
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
