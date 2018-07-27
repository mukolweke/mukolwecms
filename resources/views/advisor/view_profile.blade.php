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
                    <p><strong>Person Details:</strong></p>
                    <p>Name:&nbsp;<strong>{{$client_detail->name}}</strong></p>

                    @if($client_detail->project == null && $client_detail->investment == null)
                        <p>Project:&nbsp;<span class="label warning">Pending...</span></p>
                        <p>Investment:&nbsp;<span class="label warning">Pending...</span></p>
                    @else
                        <p>Project:&nbsp;{{$client_detail->project}}</p>
                        <p>Investment:&nbsp;{{$client_detail->investment}}&nbsp;million(s)</p>
                    @endif
                    <hr/>
                    <p><strong>Contact:</strong></p>
                    <p>Phone:&nbsp;<a href="#"><strong>{{$client_detail->phone}}</strong></a></p>
                    <p>Email:&nbsp;<a href="#"><strong>{{$client_detail->email}}</strong></a></p>
                    <hr/>

                    @if($client_detail->project == null && $client_detail->investment == null)
                        <p><strong>Invest:</strong></p>
                        <form action="/client_invest" method="post">
                            {{csrf_field()}}
                            <div class="grid-x">
                                <div class="medium-4 cell form-group">
                                    <label>Project Invested:
                                        <input type="text" name="project" placeholder="Amara" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4  cell form-group">
                                    <label>Investments:
                                        <input type="number" name="investment" placeholder="2M" class="form-control" required>
                                    </label>
                                </div>

                                <input type="text"  name="client_id" value="{{$client_detail->id}}" class="hide">
                                <div class="medium-4 cell form-group">
                                    <button type="submit" class="success button expanded" style="margin-top: 25px;">Save Client</button>
                                </div>
                            </div>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
