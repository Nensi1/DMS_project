<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMS</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- @yield('style') --}}
    @stack('styleArea')
    {{-- {!! Charts::styles() !!} --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<style>
#navbarSupportedContent{
    font-size:12pt;
    }
    </style>


</head>
<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::to('/') }}/images/logo_burned.png" width="130px;" />
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else

                        @if(Auth::user()->hasPosition('Admin') || Auth::user()->hasPosition('Manager') )
                        @if(Auth::user()->hasPosition('Admin'))
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('user.cost')}}">Costs<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('user.ecommerce')}}">Check Products <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('user.empcart')}}">
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
                            @endif
                        <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Order')}} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="{{route('user.orders')}}">{{ __('List Orders') }}</a>
                                    </div>
                                </li>
                        </li> 

                        <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Stock')}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->hasPosition('Admin'))
                                    <a class="nav-link" href="{{route('create.products')}}">{{ __('Create Product') }}</a>
                                    @endif
                                    <a class="nav-link" href="{{route('index.products')}}">{{ __('List Products') }}</a>
                                </div>
                            </li>
                        </li> 

                        <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Clients')}} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="{{route('create.clients')}}">{{ __('Register Client') }}</a>
                                        <a class="nav-link" href="{{route('index.clients')}}">{{ __('List Clients') }}</a>
                                    </div>
                                </li>
                        </li> 

                        <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __('Schedules')}} <span class="caret"></span>
                                        </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="/schedule/create">{{ __('Create') }}</a>
                                        <a class="nav-link" href="/schedule">{{ __('Check') }}</a>
                                    </div>
                                </li>
                        </li>

                        <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __('Tasks')}} <span class="caret"></span>
                                        </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="/tasks/list">{{ __('Task History') }}</a>
                                    </div>
                                </li>
                        </li>

                        <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Employees')}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="/user/create">{{ __('Register Employee') }}</a>
                                    <a class="nav-link" href="{{route('index.employees')}}">{{ __('List Employees') }}</a>
                                    <a class="nav-link" href="{{route('user.performance')}}">{{ __('Performance') }}</a>
                                </div>
                            </li>
                        </li>

                        <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="/acc/{{Auth::user()->id}}">{{ __('My account') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                       
    @elseif(Auth::user()->hasPosition('Sales Agent'))
    
    
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.ecommerce')}}">Check Products <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.empcart')}}">
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
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __('Order')}} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            {{-- <a class="nav-link" href="{{route('create.emporders')}}">{{ __('Create Order') }}</a> --}}
                                            <a class="nav-link" href="{{route('user.orders')}}">{{ __('List Orders') }}</a>
                                        </div>
                                    </li>
                            </li> 

                            <li class="nav-item">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __('Clients')}} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="nav-link" href="{{route('create.clients')}}">{{ __('Register Client') }}</a>
                                            <a class="nav-link" href="{{route('index.clients')}}">{{ __('List Clients') }}</a>
                                        </div>
                                    </li>
                            </li> 
    
                            <li class="nav-item">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ __('Schedules')}} <span class="caret"></span>
                                            </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="nav-link" href="/schedule">{{ __('Check') }}</a>
                                        </div>
                                    </li>
                            </li>
    
                            <li class="nav-item">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ __('Tasks')}} <span class="caret"></span>
                                            </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="nav-link" href="/tasks/list">{{ __('Task History') }}</a>
                                            <a class="nav-link" href="/tasks/todo">{{ __('Daily Task') }}</a>
                                        </div>
                                    </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="/acc/{{Auth::user()->id}}">{{ __('My account') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
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
                    @elseif(Auth::user()->hasPosition('Inventory Supervisor'))
                   
                    <li class="nav-item">
                            <a class="nav-link" href="{{route('user.cost')}}">Costs<span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Order')}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- <a class="nav-link" href="{{route('create.emporders')}}">{{ __('Create Order') }}</a> --}}
                                    <a class="nav-link" href="{{route('user.orders')}}">{{ __('List Orders') }}</a>
                                </div>
                            </li>
                    </li> 

                    <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Stock')}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{route('create.products')}}">{{ __('Create Product') }}</a>
                                <a class="nav-link" href="{{route('index.products')}}">{{ __('List Products') }}</a>
                            </div>
                        </li>
                    </li> 
                    
                    <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Supplier')}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="/supplier/create">{{ __('Register Supplier') }}</a>
                                <a class="nav-link" href="/supplier">{{ __('List Supplier') }}</a>
                            </div>
                        </li>
                    </li>

                    <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="/acc/{{Auth::user()->id}}">{{ __('My account') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
                    @elseif(Auth::user()->hasPosition('Delivery'))
                    <li class="nav-item">
                            <a class="nav-link" href="{{route('delivery.index')}}">Delivery<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="/acc/{{Auth::user()->id}}">{{ __('My account') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                       

                    @elseif(Auth::user()->hasPosition('Order Dispatcher'))

                    <li class="nav-item">
                            <a class="nav-link" href="{{route('dispatcher.index')}}">Dispatcher<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="/acc/{{Auth::user()->id}}">{{ __('My account') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                       

                    @endif
                    @endguest
                    </ul>
                    </div>
                    </div>
                </nav>

                <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scriptArea')

    </body>
</html>
