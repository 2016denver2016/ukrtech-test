@extends('layouts.app')
   @section('content')
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            
                <div class="title m-b-md">
                    Бинар
                </div>

                <div class="links">
                    <!-- <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a> -->
                    <a href="/binar">Показать бинар</a>
                    <!-- <a href="https://vapor.laravel.com">Показать бинар</a> -->
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            
        
     @endsection

