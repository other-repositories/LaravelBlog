<?php

namespace App\Listeners;

use App\Events\CommentDelete;
use Illuminate\Support\Facades\Log;

class CommentDeleteListener
{
    public function handle(CommentDelete $event)
    {
        Log::info('Delete comment ' . $event->comment->id);
    }
}
