<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMS</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
    <style>
#navbarSupportedContent{
        font-size:12pt;
    }
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    /* padding: 4px 0; */
}
      section .section-title {
    text-align: center;
    color: #007b5e;
    /* margin-bottom: 10px; */
    text-transform: uppercase;
}
#footer {
    background: black !important;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	/* padding: 3px 0; */
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	/* margin-top:-10px; */
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:300;
}
#footer ul.quick-links li a i{
      margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 600;
}

/* @media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
} */
     .StripeElement {
       box-sizing: border-box;
     
       height: 40px;
     
       padding: 10px 12px;
     
       border: 1px solid transparent;
       border-radius: 4px;
       background-color: white;
     
       box-shadow: 0 1px 3px 0 #e6ebf1;
       -webkit-transition: box-shadow 150ms ease;
       transition: box-shadow 150ms ease;
     }
     
     .StripeElement--focus {
       box-shadow: 0 1px 3px 0 #cfd7df;
     }
     
     .StripeElement--invalid {
       border-color: #fa755a;
     }
     
     .StripeElement--webkit-autofill {
       background-color: #fefde5 !important;
     }
     </style>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    @stack('scriptCart')
</head>
<body>
    <div id="menu-div">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/client') }}"><img src="{{ URL::to('/') }}/images/logo_burned.png" width="130px;" />
                  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth('client')
                        <li class="nav-item">
                          <a class="nav-link" href="/shop">Check Products <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('index.cartline')}}">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" width="50px" height="20px" class="svg replaced-svg">
                                        <g>
                                          <g>
                                            <path d="M214.685,402.828c-24.829,0-45.029,20.2-45.029,45.029c0,24.829,20.2,45.029,45.029,45.029s45.029-20.2,45.029-45.029    C259.713,423.028,239.513,402.828,214.685,402.828z M214.685,467.742c-10.966,0-19.887-8.922-19.887-19.887    c0-10.966,8.922-19.887,19.887-19.887s19.887,8.922,19.887,19.887C234.572,458.822,225.65,467.742,214.685,467.742z" fill="#4a4a4a"></path>
                                          </g>
                                        </g>
                                        <g>
                                          <g>
                                            <path d="M372.63,402.828c-24.829,0-45.029,20.2-45.029,45.029c0,24.829,20.2,45.029,45.029,45.029s45.029-20.2,45.029-45.029    C417.658,423.028,397.458,402.828,372.63,402.828z M372.63,467.742c-10.966,0-19.887-8.922-19.887-19.887    c0-10.966,8.922-19.887,19.887-19.887c10.966,0,19.887,8.922,19.887,19.887C392.517,458.822,383.595,467.742,372.63,467.742z" fill="#4a4a4a"></path>
                                          </g>
                                        </g>
                                        <g>
                                          <g>
                                            <path d="M383.716,165.755H203.567c-6.943,0-12.571,5.628-12.571,12.571c0,6.943,5.629,12.571,12.571,12.571h180.149    c6.943,0,12.571-5.628,12.571-12.571C396.287,171.382,390.659,165.755,383.716,165.755z" fill="#4a4a4a"></path>
                                          </g>
                                        </g>
                                        <g>
                                          <g>
                                            <path d="M373.911,231.035H213.373c-6.943,0-12.571,5.628-12.571,12.571s5.628,12.571,12.571,12.571h160.537    c6.943,0,12.571-5.628,12.571-12.571C386.481,236.664,380.853,231.035,373.911,231.035z" fill="#4a4a4a"></path>
                                          </g>
                                        </g>
                                        <g>
                                          <g>
                                            <path d="M506.341,109.744c-4.794-5.884-11.898-9.258-19.489-9.258H95.278L87.37,62.097c-1.651-8.008-7.113-14.732-14.614-17.989    l-55.177-23.95c-6.37-2.767-13.773,0.156-16.536,6.524c-2.766,6.37,0.157,13.774,6.524,16.537L62.745,67.17l60.826,295.261    c2.396,11.628,12.752,20.068,24.625,20.068h301.166c6.943,0,12.571-5.628,12.571-12.571c0-6.943-5.628-12.571-12.571-12.571    H148.197l-7.399-35.916H451.69c11.872,0,22.229-8.44,24.624-20.068l35.163-170.675    C513.008,123.266,511.136,115.627,506.341,109.744z M451.69,296.301H135.619l-35.161-170.674l386.393,0.001L451.69,296.301z" fill="#4a4a4a"></path>
                                          </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                      </svg> 
                                  <span class="sr-only">(current)</span></a>
                      </li>
  
                      <li class="nav-item">
                              <a class="nav-link" href="{{route('index.orders')}}">Order History <span class="sr-only">(current)</span></a>
                      </li>
                          {{-- <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ __('Employees')}} <span class="caret"></span>
                              </a>
  
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="nav-link" href="{{route('client.basket')}}">{{ __('Basket') }}</a>
                                  <a class="nav-link" href="{{route('client.history')}}">{{ __('Order History') }}</a>
                              </div>
                          </li> --}}
                      </li>
  
                      <li class="nav-item">
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
  
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      {{-- <a class="nav-link" href="{{route('client.account')}}">{{ __('My account') }}</a> --}}
                                  {{-- <a class="nav-link" href="{{ route('client.account') }}">{{ __('My account') }}</a> --}}
                                  <a class="dropdown-item" href="{{ route('client.logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
  
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      </li>
                          
               
                        @else
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('client.login') }}">{{ __('Login') }}</a>
                          </li>
                            @if (Route::has('ecommerce'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="/shop">Check Products <span class="sr-only">(current)</span></a>
                                    </li>
                            @endif
                    
                        
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
  <!-- Footer -->
  {{-- <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; DMS Shpk</p>
    </div>
    <!-- /.container -->
  </footer> --}}
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
	@stack('footer')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  @stack('scriptCart2')

</body>
</html>
