<?php
        if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}
?>
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner">
                    <x-danger-alert/>
                    <x-success-alert/>
                    <div class="mb-5 row p-md-3">
                        <div class="shadow col-12 p-md-2">
                            <div class="col-12 text-center bg-{{$bg}} p-3">
                                <h1 class="title1 text-{{$text}}">Notifications</h1>
                            </div>
                            <div class="pb-5 col-md-10 offset-md-1">
                                @forelse($Notif as $notif)
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $notif->message }}
                                        <small class="d-block text-muted mt-2">{{ $notif->created_at }}</small>
                                    </div>
                                @empty
                                    <div class="text-center text-{{$text}} p-5">
                                        <h4>You have no notifications yet.</h4>
                                    </div>
                                @endforelse
                                <div class="mt-3">
                                    {{ $Notif->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
