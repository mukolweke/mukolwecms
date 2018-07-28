@extends('layouts.app')

@section('content')

    <div>
        <div class="jumbo">
            <h1>Authentication</h1>
            <hr>
        </div>

        <div class="grid-x">

            <div class="form-container small-6 small-centered columns">

                <form class="login-form" method="POST" action="{{route('advisor_verify')}}">

                    <p class="text-center" style="margin-top: 50px;">Please enter the code sent to you in mail</p>

                    @if($data['err'] != null)
                    <div class="callout alert text-center" style="height: 50px;">
                        <span>{{$data['err']}}</span>
                    </div>
                    @endif

                    {{ csrf_field() }}

                    <div class="form-group">

                        <input id="activation_code" class="form-control" type="text" name="activation_code" required autofocus>

                    </div>
                    <input type="text" class="hide" name="email" value="{{$data['account_details']->email}}" required>

                    <div class="button-plus-link">
                        <button type="submit" class="button expanded ">
                            <strong>Verify</strong>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
