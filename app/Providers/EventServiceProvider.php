<?php
namespace App\Providers;

use App\Models\Notary;
use App\Observers\NotaryObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider {

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];


    public function boot() {
        Notary::observe(NotaryObserver::class);
    }

    public function shouldDiscoverEvents() {
        return false;
    }
}
