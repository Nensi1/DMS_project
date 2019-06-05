<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://js.stripe.com/v3/"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .spacer {
            margin-bottom: 24px;
        }
        /**
            * The CSS shown here will not be introduced in the Quickstart guide, but shows
            * how you can use CSS to style your Element's container.
            */
        .StripeElement {
            background-color: white;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid #ccd0d2;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
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
        #card-errors {
            color: #fa755a;
        }
#navbarSupportedContent{
        font-size:12pt;
    }
    </style>

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
                                @guest
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('ecommerce'))
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
                                @endif
                                @else
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
                                    <a class="nav-link" href="#">Order History <span class="sr-only">(current)</span></a>
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
                                
                                
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
        
                <main class="py-4">

                    <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <h1>Payment Form</h1>
                        <div class="spacer"></div>

                        @if (Session::get('success_message'))
                            <div class="alert alert-success">
                                {{Session::get('success_message') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('stripePayment') }}" method="POST" id="payment-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
                            </div>

                            <div class="form-group">
                                <label for="name_on_card">Name on Card</label>
                                <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->email}}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->city}}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="province">Country</label>
                                        <input type="text" class="form-control" id="country" name="country">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postalcode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="total">Total</label>
                                        <input type="text" class="form-control" id="total" name="total" value="{{$total}}" readonly>
                                        </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="card-element">Credit Card</label>
                                <div id="card-element">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <div class="spacer"></div>

                            <button type="submit" class="btn btn-success">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Raleway", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
                },
                invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                displayError.textContent = event.error.message;
                } else {
                displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var options = {
                name: document.getElementById('name_on_card').value,
                }
                stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        })();
    </script>
</body>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; DMS Shpk</p>
        </div>
        <!-- /.container -->
      </footer>
</html>