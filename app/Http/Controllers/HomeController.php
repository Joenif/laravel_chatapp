<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\MessageComment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $user_id = auth()->id();
        $user_messages =  Message::whereSender_idOrReceiver_id($user_id, $user_id)->get();
        return view('home', compact('user_messages','users'));
    }

    public function users() {
        $users = User::all();
        return $users;
    }

}
