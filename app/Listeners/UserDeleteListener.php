<?php

namespace App\Listeners;

use App\Events\UserDelete;
use Illuminate\Support\Facades\Log;

class UserDeleteListener
{
    public function handle(UserDelete $event)
    {
        Log::info('Delete user ' . $event->post->id);
    }
}
