@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">
                <div class="card-header">{{ __('Register New Product') }}</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('store.product') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <hr>
                        <div class="notification is-danger">
                            <ul> 
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                        </div>
                        @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="prod_category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="prod_category" class="form-control" id="prod_category">
                                    <option value="">-- Select --</option>
                                        @foreach ($category as $categ) 
                                                <option>{{ $categ->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barcode" class="col-md-4 col-form-label text-md-right">{{ __('Barcode') }}</label>
                            <div class="col-md-6">
                                <input id="barcode" type="text" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}" name="barcode" value="{{ old('barcode') }}" required autofocus>
    
                                @if ($errors->has('barcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required autofocus>

                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>
                            <div class="col-md-6">
                                <select name="unit" class="form-control" id="unit">
                                    <option value="">-- Select --</option>
                                        <option>COPE</option>
                                        <option>KG</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="buy_price" class="col-md-4 col-form-label text-md-right">{{ __('Buy Price') }}</label>

                            <div class="col-md-6">
                                <input id="buy_price" type="text" class="form-control{{ $errors->has('buy_price') ? ' is-invalid' : '' }}" name="buy_price" value="{{ old('buy_price') }}" required autofocus>

                                @if ($errors->has('buy_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buy_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="sell_prof" class="col-md-4 col-form-label text-md-right">{{ __('Intended Profit Margin') }}</label>

                            <div class="col-md-6">
                                <input id="sell_prof" type="text" class="form-control{{ $errors->has('sell_prof') ? ' is-invalid' : '' }}" name="sell_prof" placeholder="%"value="{{ old('sell_prof') }}" required autofocus>

                                @if ($errors->has('sell_prof'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sell_prof') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="supplier" class="col-md-4 col-form-label text-md-right">{{ __('Supplier') }}</label>
                            <div class="col-md-3">
                                <select name="supplier" class="form-control" id="supplier">
                                    <option value="{{ old('supplier') }}">-- Select --</option>
                                        @foreach ($suppliers as $supplier) 
                                            <option>{{ $supplier->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                                
                        
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input id="product_image" type="file" class="form-control" name="product_image">
                            </div>
                        </div>



                        <input type="submit" class="btn btn-primary" value="CREATE PRODUCT">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection