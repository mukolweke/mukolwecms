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
                        <form action="/create_followup" method="post">
                            {{csrf_field()}}
                            <div class="grid-x">
                                <div class="medium-6 columns">
                                    <label>Select FollowUp Type
                                        <select name="name">
                                            <option value="">Choose followup ...</option>
                                            <option value="call">Call</option>
                                            <option value="email">Email</option>
                                            <option value="Text Messaging">Text Messaging</option>
                                            <option value="meeting">Physical Meeting</option>
                                        </select>
                                    </label>
                                    <input type="text"  name="advisor_id" value="<?php echo session()->get('user_id'); ?>" class="hide">
                                    <label>Select Client Name:
                                        <select name="client_id">
                                            <option value="">Choose ...</option>
                                            @foreach($data['all_clients'] as $all_client)
                                                <option value="{{$all_client->id}}">{{$all_client->name}}</option>
                                            @endforeach

                                        </select>
                                    </label>


                                    <button type="submit" style="margin-top: 25px;" class="button expanded primary">SAVE FOLLOWUP</button>

                                </div>
                                <div class="medium-6 columns">
                                    <div class="form-group">
                                        <label>Client Feedback:
                                            <textarea name="feedback" id="" name="feedback" cols="30" rows="8"></textarea>
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <hr/>

                <div class="table-scroll" >
                    <h4 class="text-center">Follow-Ups for {{session()->get('email')}}</h4>
                    @if($data['all_followups']->count() > 0)
                        <table style="margin: 0 auto;">
                            <thead style="background: black;color: white;">
                            <tr>
                                <th width="200">Name</th>
                                <th width="200">Source</th>
                                <th width="150">Description</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['all_followups'] as $all_followup)

                                <tr>
                                    <td>{{$all_followup->name}}</td>
                                    <td><a href="{{$all_followup->source}}">Go There</a> </td>
                                    <td>{{$all_followup->description}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="callout success radius text-center" style="width: 40%;margin: 0 auto;" data-closable>

                            <h4>You have no follow-ups made yet</h4>
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
