<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Carbon;
use App\Events\PostPublish;
use App\Events\PostDelete;

class PostController extends Controller {
	function index() {
		$posts = Post::where('is_published', 1)->get();
		$users = User::all();
		return view("posts", ["rows" => $posts], ["user" => $users]);
	}

	function add() {
		return view("add_post");
	}
	
	
	function view($user) {
		$posts = Post::WithUser($user);
        	return view('/user/'.$user, ['posts' => $posts], ['user' => $user]);
	}

	public function edit($user, $post){
        	$edit_post = Post::find($post);
        	return view('edit_post', ['edit_post' => $edit_post], ['user' => $user]);
    }

	function store($user, Request $request) {
		$request->validate([
            		'title' => 'required|string|max:255',
            		'text' => 'required|string',
        	]);

		$post = Post::find($request->id) ?? new Post;
		$post->title = $request->title;
		$post->text = $request->text;
		$post->publish_datetime = $request->datetime;
		$post->user_id = $user;
		if ($request->input('is_published') == '1'){
        		event(new PostPublish($post));
            		$post->is_published = 1;
        	}else{
            		$post->is_published = 0;
        	}
		$post->save();

		return redirect('/user/'.$user)->with('Ok', '');
	}
		
	function drop($user, $post) {
	        $delete_post = Post::find($post);
        	$delete_post->delete();
        	event(new PostPublish($delete_post));
        	return redirect('/user/'.$user)->with('Ok', '');

	}
}
