<?php

namespace App\Http\Controllers;

use App\User;
use App\Conversations;
use App\ConversationUsers;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

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
        $conversations = Conversations::where('sender_id', auth()->id())
                                        ->orWhere('receiver_id', auth()->id())->get();
        return $conversations;
    }

    public function users()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conversationUsers = ConversationUsers::where(['sender_id' => auth()->id(), 'receiver_id' => $request->receiver])
                                                ->orWhere(['receiver_id' => auth()->id(), 'sender_id' => $request->receiver])->first();
        if(request()->has('file')) {
            //
        } else {
            $message = Conversations::create([
                'messages' => $request->message,
                'receiver_id' => $request->receiver,
                'sender_id' => auth()->id()
            ]);
        }

        return response()->json($message, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
