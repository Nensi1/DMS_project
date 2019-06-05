@extends(Auth::user()->isUser() ? 'layouts.app' : 'layouts.client-app')

@section('content')
<div class="container">

        <div class="row">
    
          <div class="col-lg-3">
            <h1 class="my-4">OSHEE</h1>
            <div class="list-group">
              <a href="#" class="list-group-item active">{{$product->category}}</a>
            </div>
          </div>
          <!-- /.col-lg-3 -->
    
          <div class="col-lg-9">
        <form action="{{ route('store.cartline') }}" method="POST" role="form" enctype="multipart/form-data">
            <div class="card mt-4">
              <img class="card-img-top img-fluid" src="{{ asset($product->image) }}" style="height:500px;"  alt="">
              <div class="card-body">
                <h3 class="card-title" name="product_name">{{$product->name}}</h3>
                <h4>{{$product->sell_price}}</h4>
                <p class="card-text">{{$product->description}}</p>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stars
              </div>
              <div class="card-footer">
                  @if(!empty((int)$product->quantity) > 0)
                    <table>
                        {{-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>  --}}
                        <tr>
                        <td><button type="button" class="btn btn-outline-secondary waves-effect">
                        <div class="product_button product_cart text-left d-flex flex-column align-items-left justify-content-left">
                            <div><div><img src="/images/cart.svg" style="width:20px;"class="svg" alt=""></div></div>
                        </div>
                        </button></td>
                        <td>
                        <div class="align-right justify-content-right">
                        <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" style="width:120px;"name="quantity" value="{{ old('quantity') }}" required autofocus placeholder="Quantity"> 
                        </div>
                        </td>
                        </tr>
                    </table>
                    @else
                    <table>
                        {{-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>  --}}
                        <tr>
                            <td>
                                <button type="button" class="btn btn-outline-secondary waves-effect" disabled>
                                    <div class="product_button product_cart text-left d-flex flex-column align-items-left justify-content-left">
                                        <div><div><img src="/images/cart.svg" style="width:20px;"class="svg" alt=""></div></div>
                                    </div>
                                </button>
                            </td>
                            <td>
                            <div class="align-right justify-content-right">
                                <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" style="width:120px;"name="quantity" value="Out of Stock" required autofocus placeholder="Quantity"> 
                            </div>
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>  
            </div>
        </form>
            <!-- /.card -->
{{--     
            <div class="card card-outline-secondary my-4">
              <div class="card-header">
                Product Reviews
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <a href="#" class="btn btn-success">Leave a Review</a>
              </div>
            </div> --}}
            <!-- /.card -->
    
          </div>
          <!-- /.col-lg-9 -->
    
        </div>
    
      </div>
@endsection