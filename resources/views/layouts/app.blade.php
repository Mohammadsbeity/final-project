<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>List Trader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    List Trader
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/about_us*') ? 'active' : '' }}"
                                    href="{{ route('about_us.index') }}">{{ __('About Us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}"
                                    href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/favorites*') ? 'active' : '' }}"
                                    href="{{ route('favorites.index') }}">{{ __('Favorites') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}"
                                    href="{{ route('products.index') }}">{{ __('Products') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/product_comments*') ? 'active' : '' }}"
                                    href="{{ route('product_comments.index') }}">{{ __('Product Comments') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/product_images*') ? 'active' : '' }}"
                                    href="{{ route('product_images.index') }}">{{ __('Product Images') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/product_rates*') ? 'active' : '' }}"
                                    href="{{ route('product_rates.index') }}">{{ __('Product Rates') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/product_solds*') ? 'active' : '' }}"
                                    href="{{ route('product_solds.index') }}">{{ __('Product Solds') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                                    href="{{ route('users.index') }}">{{ __('Users') }}</a>
                            </li>
                        </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.form-select').select2({
                width: 'auto',
                theme: 'bootstrap-5',
                placeholder: "Select an option",
                allowClear: true,
            });

            setTimeout(() => {
                $('span.select2.select2-container').removeClass(
                        'select2-container--bootstrap-5 select2-container--below select2-container--focus')
                    .addClass('select2-container--default select2-container--focus');
            }, 800);
        });
    </script>
    <style>
        span.select2.select2-container.select2-container--default.select2-container--focus,
        span.select2.select2-container.select2-container--default.select2-container--below,
        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
    </style>
</body>

</html>
