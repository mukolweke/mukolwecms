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
                        <form action="/create_leads" method="post">
                            {{csrf_field()}}
                            <div class="grid-x">
                                <div class="medium-6 columns">
                                    <label>Lead Name:
                                        <input type="text" name="name" placeholder="Mike Kuku" class="form-control" required>
                                    </label>
                                    <label>Source:
                                        <input type="text" name="source" placeholder="http://" class="form-control" required>
                                    </label>
                                    <input type="text"  name="advisor_id" value="<?php echo session()->get('user_id'); ?>" class="hide">

                                    <button type="submit" class="success button expanded" style="margin-top: 25px;">Save Lead</button>

                                </div>
                                <div class="medium-6 columns">
                                    <label>Description:
                                        <textarea name="description" id="description" cols="30" rows="7"></textarea>
                                    </label>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <hr/>

                <div class="table-scroll" >
                    <h4 class="text-center">Leads assinged to {{session()->get('email')}}</h4>
                    @if($all_leads->count() > 0)
                        <table style="margin: 0 auto;">
                            <thead style="background: black;color: white;">
                            <tr>
                                <th width="200">Name</th>
                                <th width="200">Source</th>
                                <th width="150">Description</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_leads as $all_lead)

                                <tr>
                                    <td>{{$all_lead->name}}</td>
                                    <td><a href="{{$all_lead->source}}">Go There</a> </td>
                                    <td>{{$all_lead->description}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="callout success radius text-center" style="width: 40%;margin: 0 auto;" data-closable>

                            <h4>You have no Leads Added yet</h4>
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
