<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PostPublish;
use App\Events\CommentPublish;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        'App\Events\PostPublish' => [
            'App\Listeners\PostPublishListener'
        ],
    protected $listen = [
        'App\Events\CommentPublish' => [
            'App\Listeners\CommentPublishListener'
        ],
    protected $listen = [
        'App\Events\PostDelete' => [
            'App\Listeners\PostDeleteListener'
        ],
    protected $listen = [
        'App\Events\CommentDelete' => [
            'App\Listeners\CommentDeleteListener'
        ],
    protected $listen = [
        'App\Events\UserDelete' => [
            'App\Listeners\UserDeleteListener'
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
