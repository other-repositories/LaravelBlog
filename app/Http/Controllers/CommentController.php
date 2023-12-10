<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Carbon;
use App\Events\CommentDelete;
use App\Events\CommentPublish;

class CommentController extends Controller {
	function index($post) {
		$comments = Comment::where('approved', 1)->where('post_id', $post)->get();
		$get_post = Post::find($post);
		return view("post", ["rows" => $comments], ["post" => $get_post]);
	}

	function add() {
		return view("add_comment");
	}
	
	function moderation() {
		$comments = Comment::where('approved', 0)->get();
		return view("/moderate", ["rows" => $comments]);
	}

 	public function approved($comment){
        	$approved_comment = Comment::find($comment);
        	$approved_comment->approved = 1;
        	$approved_comment->save();
        	event(new CommentPublish($approved_comment));
		return redirect('/moderate')->with('Ok', '');
    	}

	function store($post, Request $request) {
 		$request->validate([
            		'name' => 'required|string|max:255',
            		'text' => 'required|string',
        	]);

		$comment = Comment::find($request->id) ?? new Comment;
		$comment->name = $request->name;
		$comment->text = $request->text;
		$comment->post_id = $post;
		$comment->save();

		return redirect('/posts')->with('Ok', '');
	}
		
	function drop($comment) {
	        $comment = Comment::find($comment);
        	$comment->delete();
        	event(new CommentDelete($comment));
        	return redirect('/moderate')->with('Ok', '');

	}
}
