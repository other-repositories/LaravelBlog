<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Carbon;
use App\Events\UserDelete;


class UserController extends Controller {
	function index() {
		$users = User::all();
		return view("users", ["rows" => $users]);
	}

	function add() {
		return view("add_user");
	}
	
	
	function view(User $user) {
		return view("user", ["user" => $user]);
	}

	function edit(User $user) {
		return view("edit_user", ["user" => $user]);
	}

	function store(Request $request) {
		$request->validate([
            		'name' => 'required|string|min:2|max:255',
            		'lastname' => 'required|string|min:2|max:255',
            		'age' => 'required|numeric|min:14',
			'email' => 'required|email'
        	]);

		$user = User::find($request->id) ?? new User;
		$user->name = $request->name;
		$user->lastname = $request->lastname;
		$user->age = $request->age;
		$user->email = $request->email;
		$user->save();

		return redirect('/users')->with('Ok', '');
	}
		
	function drop(User $user) {
	        $user = User::find($user->id);
        	$user->posts()->delete();
        	$user->delete();
        	event(new UserDelete($user));
        	return redirect('users');

	}
}