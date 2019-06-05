<div class="col-md-4">
    <button type="submit" class="btn btn-danger"data-toggle="modal" data-target="#cost"> {{ __('Create New') }}</button>
</div>
<form method="POST" action="{{ route('store.cost') }}">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="cost">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><br/><h3>New Cost </h3> incurred
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Cost') }}</label>

                        <div class="col-md-6">
                            <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="" required autofocus>

                            @if ($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-6">
                            <select name="category" class="form-control" id="category">
                                <option value="" disabled selected>-- Select --</option>
                                <option>Holding Cost</option>
                                <option>Ordering Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">COMPLETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>
        
                    </div>

        </div>
    </div>
</form>

