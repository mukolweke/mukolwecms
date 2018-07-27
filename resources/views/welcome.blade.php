@extends('layouts.app')

@section('content')
    <div class="container">

        {{--<div class="top-bar" id="example-menu">--}}
        {{--<div class="top-bar-left">--}}
        {{--<ul class="dropdown menu" data-dropdown-menu>--}}
        {{--<li class="menu-text">Financial Advisor CMS</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="top-bar-right">--}}
        {{--<ul class="menu">--}}
        {{--@if (Auth::guest())--}}
        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
        {{--@else--}}
        {{--<ul class="menu" data-dropdown-menu>--}}
        {{--<li>--}}
        {{--<a href="#">{{ Auth::user()->name }}</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="{{ route('logout') }}"--}}
        {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
        {{--Logout--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--{{ csrf_field() }}--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="jumbotron text-center">
            <h1>Financial <strong>Advisor</strong></h1>
            <h4>Client Management System</h4>
            <p>FAs are able to automate there process of client management</p>
            <div>
                <a href="/admin/login" class="button primary login_button"><strong>LOGIN ADMIN</strong></a>
                <a href="advisor/login" class="button primary login_button"><strong>LOGIN ADVISOR</strong></a>
                <a href="{{route('client_login')}}" class="button primary login_button"><strong>LOGIN CLIENT</strong></a>
            </div>
        </div>

        <hr>

        <div class="grid-x medium-offset-2 grid-margin-x small-up-2 medium-up-3 large-up-6">
            <div class="cell my_cell" style="width: 320px;">
                <img class="thumbnail" src="/storage/placeholder.jpeg">
                <h5>FA able to creates Clients</h5>
                <p>One of the final steps in every web-project is deploying to live server. Often I see a problem
                    when server is provided by the client from their hosting they had purchased long time ago,
                    and it is not suitable for convenient Laravel deployment. So in this article I will
                    make some recommendations for clients, what hosting to prepare.</p>
            </div>
            <div class="cell my_cell" style="width: 320px;">
                <img class="thumbnail" src="/storage/placeholder.jpeg">
                <h5>FA able to schedule Follow-ups</h5>
                <p>Sending email is a typical function for most web-projects: notifications, password reminders,
                    invoices are done via email.
                    But in recent years we’ve faced a technical problem. It’s not about just
                    sending emails anymore, it’s about delivering them successfully</p>
            </div>
            <div class="cell my_cell" style="width: 320px;">
                <img class="thumbnail" src="/storage/placeholder.jpeg">
                <h5>Client Management automation</h5>
                <p>Laravel-Excel package is great for exporting data. But not a lot of info there about formatting Excel
                    cells – widths, word wraps, fonts etc. So when I encountered this in a client’s project,
                    I decided to write this article with a few tips on this topic.</p>
            </div>
        </div>
    </div>
    <hr>
@endsection
