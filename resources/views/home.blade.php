@extends('layouts.app')


@section('content')
            {{-- @include('sidebar',['user_messages'=>$user_messages]) --}}
    <chat-box :user_messages={{$user_messages}} :users={{$users}} :luser={{Auth::id()}}></chat-box>

@endsection
