<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\MessageComment;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $conversation = auth()->user()->messagecomments()->create([
            'messages' => $request->message,
            'message_id' => $request->message_id
        ]);
        // $conversation = new MessageComment;
        // $conversation->user_id = auth()->user()->id;
        // $conversation->message = $request->message;
        // $conversation->message_id = $request->message_id;
        // $conversation->save();
        return response()->json($conversation);

    }

    public function getConversationUsers() {
        $user_id = auth()->id();
        $conversationUsers =  Message::whereSender_idOrReceiver_id($user_id, $user_id)->get();
        return $conversationUsers;
    }

     public function getMessages(Request $request)
    {
        $conversations =  MessageComment::where('message_id', $request->id)->with('user')->get();
        return response()->json($conversations);
        // return ['All Good'];
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
