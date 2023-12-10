<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Post;
use App\Events\PostPublish;

class PublishPost extends Command
{
protected $signature = 'publish:post';
protected $description = 'Publish post';


public function __construct()
    {
        parent::__construct();
    }


public function handle()
{
	$posts = Post::where('is_published', 0)->whereNotNull('publish_datetime')->get();

        foreach ($posts as $post) {
            if (Carbon::now()->gte($post->publish_datetime)) {
                $post->is_published = 1;
                $post->save();
        	event(new PostPublish($post));
            }
        }

        $this->info('Publish success');
}

}

