@extends('layouts.app')

@section('content')

    <div class="container" id="admin">

       @include('inc.navbar_admin')

        <router-view name="ViewAdvisor"></router-view>
        <router-view></router-view>

        <div class="admin_home_container">
            <div class="grid-x">
                <div class="medium-4 columns">
                    <div class="callout boost1">
                        <h5>Financial Advisors</h5>
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
                        <h5>Cytonn Clients</h5>
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
                        <h5>Current Shares</h5>
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

@endsection
