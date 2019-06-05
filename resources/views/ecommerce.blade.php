@extends(Auth::user()->isUser() ? 'layouts.app' : 'layouts.client-app')

@section('content')
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4"><img src="https://www.oshee.eu/images/logo_oshee.svg" width="200px;"></h1>
         <div class="list-group">
            <a href="#" id="filter isotonic" class="list-group-item">Isotonic Drinks</a>
          <a href="#" id="filter drink" class="list-group-item">Energy Drinks</a>
          <a href="#" id="filter bar" class="list-group-item">Muesli/Protein Bars</a>
     
    </div> 
      </div>

      <div class="col-lg-9">
          @if(!empty($success_message))
          <div class="alert alert-success">
              {{$success_message}}
          </div>
          @endif

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://londou.com/wp-content/uploads/2017/06/oshee-2019-article-final.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://b.cz/media/success-stories/oshee/image.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://pbs.twimg.com/media/DXxLUNHXcAEUZ8p.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      
        <div class="row">
          @foreach ($products as $product)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{{ asset($product->image) }}" style="height:250px; "></a>
              <div class="card-body">
                <h4 class="card-title">
                    @if ($errors->any())
                    <hr>
                    <div class="notification is-danger">
                        <ul> 
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </div>
                    @endif
                <form action="{{route(Auth::user()->isUser() ? 'user.cartline' : 'store.cartline')}}" method="POST">
                  {{-- <form action="/shop/{{$product->id}}" method="GET"> --}}
                  @csrf
                    <input id="product_id" type="text" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" style="width:120px;"name="product_id" value="{{$product->id}}" required autofocus hidden> 
                  @if(Auth::user()->isUser())
                  <a href="/user/shop/{{$product->id}}" name="product_name">{{$product->name}}</a>
                  @else
                  <a href="/shop/{{$product->id}}" name="product_name">{{$product->name}}</a>
                  @endif
                </h4>
                <h5>{{$product->sell_price}} LEK</h5>
                
                <p class="card-text">{{$product->description}} </p>
              </div>
              <div class="card-footer">
                  @if(!empty((int)$product->quantity) > 0)
                  <table>
                      <tr>
                      <td>
                      <div class="align-right justify-content-right">
                      <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" style="width:120px;"name="quantity" value="{{ old('quantity') }}" required autofocus placeholder="Quantity"> 
                      </div>
                      </td>
                      <td><button type="submit" class="btn btn-outline-secondary waves-effect">
                          <div class="product_button product_cart text-left d-flex flex-column align-items-left justify-content-left">
                              <div><div><img src="/images/cart.svg" style="width:20px;"class="svg" alt=""></div></div>
                          </div>
                         </td>
                      </tr>
                  </table>
                  @else
                  <table>
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
                              <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" style="width:120px;"name="quantity" placeholder="Out of Stock" required autofocus placeholder="Quantity" disabled> 
                          </div>
                          </td>
                      </tr>
                  </table>
                  @endif
                </form>
              </div>  
            </div>
          </div>
                    @endforeach
 

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  @if(Auth::user()->isUser()==false)
  @push('footer')

  <section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
              <a href="www.oshee.eu">www.oshee.eu </a>&
            <ul class="list-unstyled list-inline social text-center">
              <li class="list-inline-item"><a href="https://www.facebook.com/OsheeDrinkAlbania/"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/osheealbania/"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
            </ul>
          </div>
          </hr>
        </div>	
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
            <p> ALL RIGHTS RESERVED © 2019 OSHEE | MADE BY N.A</p>
            <p class="h6">&copy All right Reversed. <u><img src="https://www.oshee.eu/images/footerLogo.png"></u></p>
          </div>
          </hr>
        </div>	
      </div>
    </section>
    @endpush
@endif

  @push('scriptCart2')
  <style>
.carousel-inner > .item > img, .carousel-inner > .item > a > img {
    width: 100%;
}
  </style>
  @endpush
@endsection