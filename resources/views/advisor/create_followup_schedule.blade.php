@extends('layouts.app')

@section('content')

    @include('inc.navbar_advisor')


    <div id="admin" class="view_advisor">

        <div class="grid-x">
            <div class="medium-offset-2 columns medium-8">

                <div class="card">
                    <div class="card-divider">Follow-Up Schedular</div>
                    <div class="card-section">

                        {!! Form::open(['route'=> 'addSchedule', 'method' =>'POST']) !!}
                        {!! Form::token() !!}
                        <div class="grid-x">
                            <div class="medium-12 columns">
                                @if(Session::has('success'))

                                    <div class="callout success radius" data-closable>

                                        <span>{{ Session::get('success') }}</span>

                                        <button class="close-button" aria-label="Dismiss alert" type="button"
                                                data-close>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @elseif(Session::has('warning'))
                                    <div class="alert callout warning radius" data-closable>

                                        <span>{{ Session::get('warning') }}</span>

                                        <button class="close-button" aria-label="Dismiss alert" type="button"
                                                data-close>
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                            </div>
                            <div class="medium-4 columns">
                                <div class="form-group">

                                    {!! Form:: label('follow_up_name','Followup Name: ') !!}
                                    <div>
                                        {!! Form::select('follow_up_name', [''=>'Choose ...','call' => 'Call', 'email' => 'Email', 'text'=>'Text Messaging', 'meeting'=>'Physical Meeting']) !!}

                                        @if ($errors->has('name'))
                                            <div class="alert callout" data-closable>
                                                <span>{{$errors->first('follow_up_name')}}</span>
                                                <button class="close-button" aria-label="Dismiss alert" type="button"
                                                        data-close>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="medium-4 columns">
                                <div class="form-group">
                                    {!! Form:: label('start_date','Start Date: ') !!}
                                    <div>
                                        {!! Form::date('start_date', null,['class'=>'form-control']) !!}

                                        @if ($errors->has('start_date'))
                                            <div class="alert callout" data-closable>
                                                <span>{{$errors->first('start_date')}}</span>
                                                <button class="close-button" aria-label="Dismiss alert" type="button"
                                                        data-close>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="medium-4 columns">
                                <div class="form-group">
                                    {!! Form:: label('end_date','End Date: ') !!}
                                    <div>
                                        {!! Form::date('end_date', null,['class'=>'form-control']) !!}

                                        @if ($errors->has('end_date'))
                                            <div class="alert callout" data-closable>
                                                <span>{{$errors->first('end_date')}}</span>
                                                <button class="close-button" aria-label="Dismiss alert" type="button"
                                                        data-close>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-x">
                            <div class="medium-4 columns">
                                <div class="form-group">

                                    {!! Form:: label('client_id','Client Name: ') !!}
                                    <div>
                                        <select name="client_id">
                                            <option value="">Choose ...</option>
                                            @foreach($data['potential_clients'] as $all_client)
                                                <option :value="{{$all_client->id}}">{{$all_client->name}}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('name'))
                                            <div class="alert callout" data-closable>
                                                <span>{{$errors->first('client_id')}}</span>
                                                <button class="close-button" aria-label="Dismiss alert" type="button"
                                                        data-close>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="medium-4 columns">
                                <div class="form-group">

                                    {!! Form::submit('Add Schedule', ['class'=>'button expanded success', 'style'=>'color:white;margin-top:25px;font-weight:600;']) !!}

                                </div>
                            </div>
                            <input type="text" name="advisor_id" value="<?php echo session()->get('user_id')?>"
                                   class="hide">

                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>


                <div class="card">
                    <div class="card-section">

                        {!! $data['calendar_details']->calendar() !!}
                        {!! $data['calendar_details']->script() !!}


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
