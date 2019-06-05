<div class="row">
         <th scope="col">#</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Total (LEK)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Payment Status</th>
    <div class="col-sm-6">

        <form method="POST" action="{{ route('store.clients') }}">
                    @csrf
        <label>Client's Category</label>
            <select name="category" class="form-control" id="category">
                <option value="{{ old('category') }}">-- Select --</option>
                    @foreach ($categories as $category) 
                        <option>{{ $category->name }}</option>
                    @endforeach
            </select>
        <br/>
        </form>

        <label>Client's Name</label>
        <select name="client" class="form-control" id="client">
            <option value="{{ old('client') }}">-- Select --</option>
                @foreach ($clients as $client) 
                    <option>{{ $client->name }}</option>
                @endforeach
        </select>
        <br/>

        <label>Category</label>
        {!! Form::text('category',null,['placeholder'=>'Category','class'=>'form-control']) !!}
        <br/>

        <label>City</label>
        {!! Form::text('city',null,['placeholder'=>'City','class'=>'form-control']) !!}
    <br/>



        <label>Status</label>
        {!! Form::select('status',[
       'open'=>'Open',
       'completed'=>'Completed',
       'cancelled'=>'Cancelled'
       ],null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="input-group">
            <label>Repeats?</label>
            {!! Form::select('repeats',[0=>'No',1=>'Yes'],null,['class'=>'repeats form-control']) !!}
            <br/>
            <div id="freq" style="display: none;">
                <div class="input-group">
                    <span class="input-group-addon">Every:&nbsp;</span>
                    {!! Form::input('number','freq',1,['required'=>'required','class'=>'freq-a form-control','style'=>'width:65px']) !!}

                    {!! Form::select('freq_term',[
               'day'=>'Day',
               'week'=>'Week',
               'month'=>'Month',
               'year'=>'Year'],null,['required'=>'required','class'=>'freq-b form-control','style'=>'width:100px']) !!}

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <span class="input-group-addon">Start:&nbsp;</span>
            {!! Form::input('date','start_date',date('Y-m-d'),['placeholder'=>'Start','class'=>'form-control']) !!}
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">End:&nbsp;&nbsp;</span>
            {!! Form::input('date','end_date',date('Y-m-d'),['placeholder'=>'End','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<label>Notes</label>
{!! Form::textarea('notes',null,['class'=>'form-control','rows'=>3]) !!}