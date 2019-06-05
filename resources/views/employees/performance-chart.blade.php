@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">
                <div class="card-header">{{ __('Check Performance') }}</div>

                <div class="card-body">
                        <form method="GET" action="/performance/month">
                            <a href="/performance">Reset</a>
      
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select name="type" class="form-control" id="type" style="width:200px;">
                                        <option value="">-- Select --</option>
                                        <option>Salary</option>
                                        <option>Bonus</option>
                                        <option>Score</option>
                                        <option>Delivery Time</option>

                                    </select>
                                  </div>
                                  <div class="col-md-4">
                                    <select name="month" class="form-control" id="month" style="width:200px;">
                                        <option value="">-- Select --</option>
                                        <option>Jan</option>
                                        <option>Feb</option>
                                        <option>Mar</option>
                                        <option>Apr</option>
                                        <option>May</option>
                                        <option>Jun</option>
                                        <option>Jul</option>
                                        <option>Aug</option>
                                        <option>Sep</option>
                                        <option>Oct</option>
                                        <option>Nov</option>
                                        <option>Dec</option>
                                    </select>
                                  </div>
                                    <button type="submit"  class="btn btn-primary">Check</button>
                          </div>
                            </form>
                    <div>
                      {!! $chart->container() !!}
                    </div>
                    <hr>
                </div>
                  </div>
            </div>
        </div>
    </div>


{{-- <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}
{!! $chart->script() !!}
@endsection