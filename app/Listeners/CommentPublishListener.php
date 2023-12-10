<?php

namespace App\Listeners;

use App\Events\CommentPublish;
use Illuminate\Support\Facades\Log;

class CommentPublishListener
{
    public function handle(CommentPublish $event)
    {
        Log::info('Publish comment ' . $event->comment->id);
    }
}
