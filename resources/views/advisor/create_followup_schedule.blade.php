@extends('layouts.app')

@section('content')

    @include('inc.navbar_advisor')

    {{--<div data-alert class="alert">--}}
        {{--This is an alert - alert that is rounded.--}}
        {{--<a href="#" class="close">&times;</a>--}}
    {{--</div>--}}


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

                                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @elseif(Session::has('warning'))
                                    <div class="alert callout warning radius" data-closable>

                                        <span>{{ Session::get('warning') }}</span>

                                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                            </div>

                            <div class="medium-4 columns">
                                <div class="form-group">
                                    {!! Form:: label('name','Schedule Name: ') !!}
                                    <div>
                                        {!! Form::text('name', null,['class'=>'form-control']) !!}

                                        @if ($errors->has('name'))
                                            <div class="alert callout" data-closable>
                                                <span>{{$errors->first('name')}}</span>
                                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
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
                                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
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
                                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="medium-2 small-2 large-2 columns text-center">
                                {!! Form::submit('Add Schedule', ['class'=>'button success', 'style'=>'color:white;font-weight:600;']) !!}
                            </div>

                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>


                <div class="card">
                    <div class="card-section">

                        {{--{!! $calendar_details->calendar() !!}--}}
                        {!! $calendar_details->script() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
