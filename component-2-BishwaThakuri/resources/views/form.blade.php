<!DOCTYPE html>
<html>
<head>
    <title>Add Product Form</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="images/logo.png" style="width: 120px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     
                    <ul class="navbar-nav ms-auto">
                          
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user-profile') }}">
                                        {{ __('My Profile') }}
                                    </a>
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


<div class="wrapper fadeInDown">
    <div class="signup-form product">
        <div class="fadeIn first">
            <?php session_start(); ?>
            @if(Session::has('product_added'))
            <div class="alert alert-sucess" role="alert">
                {{Session::get('product_added')}}
            </div>
            @endif

            <form action="{{route('addproduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Add Product</h2>
                <hr>
                <div class="form-group">
                    <label for="product_type">Product Type:</label>
                    <?php
                    $categories = DB::table('categories')->get();
                    ?>
                    <select id="product_type" name="product_type">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Title" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="fName" placeholder="First Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="lName" placeholder="Last Name/Brand/Console" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="pages" placeholder="Pages / Playlength" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="price" placeholder="Price" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Add product</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>