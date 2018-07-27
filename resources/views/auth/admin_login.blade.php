@extends('layouts.app')

@section('content')

<div>
    <div class="jumbo">
        <h1>Admin Login</h1>
        <hr>
    </div>


    <div class="row">

        <div class="form-container small-6 small-centered columns">

            @if($validator != null)
                <div class="alert callout warning radius" style="margin-top: 50px;" data-closable>

                    <span>{{$validator}}</span>

                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif

            <form class="login-form" method="POST" style="margin-top: 10px;" action="{{route('home_admin')}}">

                {{ csrf_field() }}

                <div class="email">
                    <label for="email">E-Mail Address</label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelpText" required autofocus>

                </div>

                <div class="password">
                    <label for="password">Password</label>

                    <input id="password" type="password" name="password" aria-describedby="passwordHelpText" required>

                </div>

                <div class="button-plus-link">
                    <button type="submit" class="button expanded ">
                        <strong>Login Here</strong>
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection
