<?php

namespace App\Listeners;

use App\Events\PostDelete;
use Illuminate\Support\Facades\Log;

class PostDeleteListener
{
    public function handle(PostDelete $event)
    {
        Log::info('Delete post ' . $event->post->id);
    }
}
