@extends('layouts.app')

@section('content')

    @include('inc.navbar_advisor')

    <div id="admin" class="view_advisor">

        <div class="grid-x">
            <div class="medium-offset-2 columns medium-8">

                <div class="card">
                    <div class="card-divider">Create New Client</div>
                    <div class="card-section">

                        @if(Session::has('success'))
                            <div class="callout success radius" data-closable>

                                <span>{{ Session::get('success') }}</span>

                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    <p>{{ Session::get('error') }}</p>
                                </div>
                            @endif
                        <form action="/create_client" method="post">
                            {{csrf_field()}}
                            <div class="grid-x">
                                <div class="medium-4 cell form-group">
                                    <label>Name:
                                        <input type="text" name="name" placeholder="Mike Kuku" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4  cell form-group">
                                    <label>Email:
                                        <input type="email" name="email" placeholder="mike@kuku.com" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4 cell form-group">
                                    <label>Phone:
                                        <input type="number" name="phone" maxlength="10" placeholder="0722000000" pattern=".{3,}" class="form-control" required>
                                    </label>
                                </div>
                            </div>
                            <div class="grid-x">
                                <div class="medium-4 cell form-group">
                                    <label>Project Invested:
                                        <input type="text" name="project" placeholder="Amara" class="form-control">
                                    </label>
                                </div>
                                <div class="medium-4  cell form-group">
                                    <label>Investments:
                                        <input type="number" name="investment" placeholder="2M" class="form-control">
                                    </label>
                                </div>

                                <input type="password" name="password"  value="Chancery1" class="hide">
                                <input type="text"  name="activation_code" value="<?php echo (rand(1000, 9999)) ?>" class="hide">
                                <input type="text"  name="advisor_id" value="<?php echo session()->get('user_id'); ?>" class="hide">


                                <div class="medium-4 cell form-group">
                                    <button type="submit" class="success button expanded" style="margin-top: 25px;">Save Client</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


                <div class="table-scroll" >
                    <h4 class="text-center">Full Cytonn Investments Clients</h4>
                    @if($all_clients->count() > 0)
                        <table style="margin: 0 auto;">
                            <thead style="background: black;color: white;">
                            <tr>
                                <th width="200">Name</th>
                                <th width="150">Email</th>
                                <th width="200">Phone</th>
                                <th width="150">Investment</th>
                                <th width="150">Project</th>
                                <th width="150"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_clients as $all_client)

                                <tr>
                                    <td>{{$all_client->name}}</td>
                                    <td>{{$all_client->email}}</td>
                                    <td>{{$all_client->phone}}</td>
                                @if($all_client->project == null && $all_client->investment == null)
                                        <td><span class="label warning">Pending...</span></td>
                                        <td><span class="label warning">Pending...</span></td>
                                    @else
                                        <td>{{$all_client->investment}}&nbsp;million(s)</td>
                                        <td>{{$all_client->project}}</td>
                                        @endif

                                    <td><a href="/view_client_profile/{{$all_client->id}}">View Profile</a> </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="callout success radius text-center" style="width: 40%;margin: 0 auto;" data-closable>

                            <h4>You have No Clients Added yet</h4>
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>


            </div>
        </div>

    </div>
@endsection
