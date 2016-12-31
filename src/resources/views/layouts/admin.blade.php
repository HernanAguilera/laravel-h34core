@extends('layouts.body')

@section('content')

        <div class="columns medium-2 sidebar">
            <ul class="side-nav menu">
                @section('lateral')
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                @stop
            </ul>
        </div>
        <div class="columns medium-10 medium-offset-2 main">
            @include('layouts.fragments.messages')
            @include('layouts.fragments.errors')
            @yield('work')
        </div>

@stop
