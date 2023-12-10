<?php

namespace App\Listeners;

use App\Events\PostPublish;
use Illuminate\Support\Facades\Log;

class PostPublishListener
{
    public function handle(PostPublish $event)
    {
        Log::info('Publish post ' . $event->post->id);
    }
}
