@extends('layouts.app')

@section('content')

    <div class="container" id="admin">

       @include('inc.navbar_advisor')

        <router-view name="ViewAdvisor"></router-view>
        <router-view></router-view>
    </div>

@endsection
