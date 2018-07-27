@extends('layouts.app')

@section('content')

    @include('inc.navbar_advisor')

    <div id="admin" class="view_advisor">

        <div class="grid-x">
            <div class="medium-6 columns">
                <img src="/storage/no_img_profile.svg" style="height: 80%;">
            </div>
            <div class="medium-6 columns">
                @foreach($client_details as $client_detail)
                    <hr/>
                    <p><button>Person Details</button></p>
                    <p>Name:&nbsp;<strong>{{$client_detail->name}}</strong></p>
                    <p>Project Invested:&nbsp;<strong>{{$client_detail->project}}</strong></p>
                    <p>Investment Amount:&nbsp;<strong>{{$client_detail->investment}}</strong>&nbsp;millions</p>
                    <hr/>
                    <p><button>Contact</button></p>
                    <p>Phone:&nbsp;<a href="#"><strong>{{$client_detail->phone}}</strong></a></p>
                    <p>Email:&nbsp;<a href="#"><strong>{{$client_detail->email}}</strong></a></p>
                    <hr/>
                    @endforeach
            </div>
        </div>

    </div>
@endsection
