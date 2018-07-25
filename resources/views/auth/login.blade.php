@extends('layouts.app')

@section('content')

<div>
    <div class="jumbo">
        <h1>Login</h1>
        <hr>
    </div>

    <div class="row">

        <div class="form-container small-6 small-centered columns">

            <form class="login-form" method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

                <div class="email">
                    <label for="email">E-Mail Address</label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelpText" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-text" id="emailHelpText">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="password">
                    <label for="password">Password</label>

                    <input id="password" type="password" name="password" aria-describedby="passwordHelpText" required>

                    @if ($errors->has('password'))
                        <span class="help-text" id="passwordHelpText">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
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
