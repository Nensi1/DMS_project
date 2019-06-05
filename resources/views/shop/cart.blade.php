@extends(Auth::user()->isUser() ? 'layouts.app' : 'layouts.client-app')
@push('styleArea')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

@endpush
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <HR>
                <div class="card">
                    <div class="card-header">My Cart</div>
    
                    <div class="card-body">
                        <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total with VAT</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Auth::user()->isUser())
                                    @foreach($cartlines as $cartline)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td>{{$cartline->product->name}}</td>
                                        <td>{{$cartline->product->sell_price}}</td>
                                        <form method="POST" action="{{route('usercartline.update', ['cartline'=>$cartline->id])}}">{{--   --}}
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                        <td><input id="quantity" type="text" class="form-control{{ $errors!=null ? ' is-invalid' : '' }}" name="quantity" value="{{ $cartline->quantity }}" size="2"required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors }}</strong>
                                            </span>
                                        </form>
                                        <td>{{$cartline->total}}</td>
                                        <a href="shop/{{$cartline->product->id}}"><td><img src="{{ asset($cartline->product->image) }}" style="height: 40px; border-radius: 50%;"></td></a>
                                        <td>  
                                            <form method="POST" action="{{route('usercartline.destroy', ['cartline'=>$cartline->id])}}">{{--  --}}
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <div class="field">
                                                <button type="submit" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <form method="GET" action="{{route('user.checkout')}}" id="neworder">   {{-- {{route('user.checkout')}} --}}
                                                @csrf
                                        <td><b><input type="text" name="total"id="total" value="{{$sum}}" size="6;" readonly>LEK</b></td>
                                </tbody>
                                </table> 
                                    <div class="form-group row mb-0">
                                        
                                <div class="col-md-6 offset-md-4">
                                        @if($sum>0)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#test"> {{ __('PROCEED') }}</button>


                                    <div class="modal" tabindex="-1" role="dialog" id="test">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Last Step: <br/><h3>Choose Client</h3></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input class="typeahead form-control" name="client" placeholder="Search client's name here..." style="auto;width:300px;" type="text">
                                             
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success">FINISH ORDER</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                                @else
                                    <button type="submit" class="btn btn-primary" disabled>
                                            {{ __('PROCEED') }}
                                        </button>
                                    @endif
                                </div>
                            @else
                                
                            @foreach($cartlines as $cartline)
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td>{{$cartline->product->name}}</td>
                                <td>{{$cartline->product->sell_price}}</td>
                                <form method="POST" action="{{route('cartline.update', ['cartline'=>$cartline->id])}}"> 
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                <td>  <td><input id="quantity" type="text" class="form-control{{ $errors!=null ? ' is-invalid' : '' }}" name="quantity" value="{{ $cartline->quantity }}" size="2"required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors }}</strong>
                                    </span>
                            </form>
                                <td>{{$cartline->total}}</td>
                                <a href="shop/{{$cartline->product->id}}"><td><img src="{{ asset($cartline->product->image) }}" style="height: 40px; border-radius: 50%;"></td></a>
                                <td> 
                                        
                                        <form method="POST" action="{{route('cartline.destroy', ['cartline'=>$cartline->id])}}"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="field">
                                            <button type="submit" class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                       
                                       </form>
                                   </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <form method="GET" action="{{route('checkout')}}" id="neworder">   {{-- {{ route('store.orders') }} --}}
                                        @csrf
                                <td><b><input type="text" name="total"id="total" value="{{$sum}}" size="6;" readonly>LEK</b></td>
                        </tbody>
                    </table> 
                        <div class="form-group row mb-0">
                            
                            <div class="col-md-6 offset-md-4">
                                    @if($sum>0)
                                <button type="submit" class="btn btn-primary">
                                    {{ __('CHECKOUT') }}
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>
                                        {{ __('CHECKOUT') }}
                                    </button>
                                @endif
                        @endif
                            </div>
                        </div>                          
                    </div>
                </form>  
                </div>
            </div>
        </div>
</div>
@push('scriptArea')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
// /* When the user clicks on the button,
// toggle between hiding and showing the dropdown content */
// function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// function filterFunction() {
//   var input, filter, ul, li, a, i;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   div = document.getElementById("myDropdown");
//   a = div.getElementsByTagName("a");
//   for (i = 0; i < a.length; i++) {
//     txtValue = a[i].textContent || a[i].innerText;
//     if (txtValue.toUpperCase().indexOf(filter) > -1) {
//       a[i].style.display = "";
//     } else {
//       a[i].style.display = "none";
//     }
//   }
//}
// (function($) {
//        $('#property_id').on('change', function() {
//             var optionSelected = $(this).find("option:selected");
//              var prop_type = optionSelected.val();
//         $.ajax({
//                type: "GET",
//                url: "{{URL::to('pages/property_type') }}",
//                dataType: "json",
//                data: {ptyname: prop_type},
//                success:function(row)
//             {
//                 alert(val);
//                 //update your code by this
//                 // this will assign response to div
//                 //<div id="search-response"> </div>
//                 $("#search-response").html().html(row);
//             }
//          }); 
//      });
// })(jQuery);
</script>
@endpush
@endsection

