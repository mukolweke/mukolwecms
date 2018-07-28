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
                                <p> # {{$data['all_clients']->count()}}</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/users-group.svg" class="css-class" alt="alt text">
                            </div>
                        </div>
                        <a href="/home_advisor_dash">View Dash</a>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div class="callout boost2">
                        <h5>FA Clients</h5>
                        <div class="grid-x">
                            <div class="medium-4 cell">
                                <p> # {{$data['my_clients']->count()}}</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/group.svg" class="css-class" alt="alt text">
                            </div>
                        </div>
                        <a href="/view_client_advisor">View Dash</a>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div class="callout boost3">
                        <h5>FA Sales</h5>
                        <div class="grid-x">
                            <div class="medium-4 cell">


                                @foreach($data['my_clients'] as $my_client)
                                    <?php $coll = []; array_push($coll, ($my_client['investment'])); echo array_sum($coll);

                                    ?>
                                @endforeach

                                <p>{{array_sum($coll)}}</p>

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
    <div class="table-scroll">
        <h4 class="text-center">Full Cytonn Investments Clients</h4>
        @if($data['all_clients']->count() > 0)
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
                @foreach($data['all_clients'] as $all_client)

                    <tr>
                        <td>{{$all_client['name']}}</td>
                        <td>{{$all_client['email']}}</td>
                        <td>{{$all_client['phone']}}</td>
                            <td>
                                @foreach($all_client['investment'] as $inv)
                                    {{$inv->investment}}&nbsp;millions.<hr/>
                                @endforeach

                            </td>
                            <td>
                                @foreach($all_client['investment'] as $inv)
                                    {{$inv->project}}<hr/>
                                @endforeach
                            </td>
                        <td>{{$all_client['advisor']}}</td>
                        <td><a href="/view_client_profile/{{$all_client['id']}}">View Profile</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        @else
            <div class="callout success radius text-center" style="width: 40%;margin: 0 auto;" data-closable>

                <h4>No Clients Added yet</h4>
                <p></p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

@endsection
