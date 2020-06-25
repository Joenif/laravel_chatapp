@extends('layouts.app')


@section('content')
@foreach ($user_messages as $chat)

@endforeach
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 px-0">
            {{-- @include('sidebar',['user_messages'=>$user_messages]) --}}
            <side-bar :user_messages={{$user_messages}} :users={{$users}} :user={{Auth::id()}}></side-bar>
        </div>
        <div class="col-md-8 px-0">
            <div class="card rounded-0">
                <div class="card-header px-4 py-3">
                    <p class="mb-0">Chat</p>
                </div>

                <div class="card-body chat-box">
                    Continue chat or start a new Conversation
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
