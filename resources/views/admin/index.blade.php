@extends('layouts.app')

@section('content')

    <div class="container" id="admin">

        <div class="row">

            <div class="form-container small-6 small-centered columns">

                <router-view name="IndexAdmin"></router-view>
                <router-view></router-view>

            </div>

        </div>

    </div>
@endsection
