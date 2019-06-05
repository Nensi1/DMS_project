@extends('layouts.app')

@section('style')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
  <div class="container">
  <div class="card">
        <div class="card-header" style="background: #2e6da4;color: white;">Assign Employee Task</div>

        <div class="card-body"> 

          {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('warnning'))
                    <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                @endif

            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
              <div class="form-group">
                  {!! Form::label('area','Area:') !!}
                  <div class="">
                  {!! Form::text('area', null, ['class' => 'form-control']) !!}
                  {!! $errors->first('area', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
              </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
              <div class="form-group">
                  {!! Form::label('category','Category:') !!}
                  <div class="">
                  {!! Form::text('category', null, ['class' => 'form-control']) !!}
                  {!! $errors->first('category', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
              </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
              <div class="form-group">
                {!! Form::label('start_date','Start Date:') !!}
                <div class="">
                {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
              <div class="form-group">
                {!! Form::label('end_date','End Date:') !!}
                <div class="">
                {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
            {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
            </div>
          </div>
          {!! Form::close() !!}

    </div>

  </div>
<hr>
  <div class="card">
    <div class="card-header"style="background: #2e6da4;color: white;">Schedule</div>
    <div class="card-body" >
        {!! $calendar_details->calendar() !!}
        {!! $calendar_details->script() !!}
    </div>
  </div>

  </div>
@endsection