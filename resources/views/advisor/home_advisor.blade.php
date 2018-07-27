@extends('layouts.app')

@section('content')

    <div class="container" id="admin">

       @include('inc.navbar_advisor')

        <router-view name="ViewAdvisor"></router-view>
        <router-view></router-view>

        <div class="admin_home_container">
            <div class="grid-x">
                <div class="medium-4 columns">
                    <div class="callout boost1">
                        <h5>Cytonn Clients</h5>
                        <div class="grid-x">
                            <div class="medium-4 cell">
                                <p> # 5</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/users-group.svg" class="css-class" alt="alt text">
                            </div>
                        </div>
                        <a href="/view_fa">View Dash</a>
                    </div>
                </div>
                <div class="medium-4 columns" >
                    <div class="callout boost2">
                        <h5>FA Clients</h5>
                        <div class="grid-x">
                            <div class="medium-4 cell">
                                <p> # 15</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/group.svg" class="css-class" alt="alt text">
                            </div>
                        </div>
                        <a href="/view_clients">View Dash</a>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div class="callout boost3">
                        <h5>FA Sales</h5>
                        <div class="grid-x">
                            <div class="medium-4 cell">
                                <p> 10b</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/dollar-symbol.svg" class="css-class" alt="alt text">
                            </div>
                        </div>
                        <a href="#">View Dash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="table-scroll" >
        <h4 class="text-center">Full Cytonn Investments Clients</h4>
        @if($all_clients->count() <0)
            <table style="margin: 0 auto;">
                <thead style="background: black;color: white;">
                <tr>
                    <th width="200">Name</th>
                    <th width="150">Email</th>
                    <th width="200">Phone</th>
                    <th width="150">Investment</th>
                    <th width="150">Project</th>
                    <th width="150">FA</th>
                    <th width="150"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_clients as $all_client)

                    <tr>
                        <td>{{$all_client->name}}</td>
                        <td>{{$all_client->email}}</td>
                        <td>{{$all_client->phone}}</td>
                        <td>{{$all_client->investment}}&nbsp;million</td>
                        <td>{{$all_client->project}}</td>
                        <td>{{$all_client->advisor}}</td>
                        <td><a href="#">View Profile</a> </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            @else
            <div class="callout success radius text-center" style="width: 40%;margin: 0 auto;" data-closable>

                <h4>No Clients Added yet</h4>
                <p><?php echo session()->get('payload');?></p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
    </div>

@endsection
