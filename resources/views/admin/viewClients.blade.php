@extends('layouts.app')

@section('content')

    <div id="admin">

        <div class="grid-x">
            <div class="medium-offset-2 columns medium-8">

                <router-view name="ViewClients"></router-view>
                <router-view></router-view>

            </div>
        </div>

    </div>
@endsection
