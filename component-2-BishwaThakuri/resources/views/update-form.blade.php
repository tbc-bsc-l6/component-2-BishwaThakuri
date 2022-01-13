<!DOCTYPE html>
<html>
<head>
    <title>Update Product Form</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../images/logo.png" style="width: 120px;">
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
            @if(Session::has('product_update'))
            <div class="alert alert-sucess" role="alert">
                {{Session::get('product_update')}}
            </div>
            @endif

            <form action="{{url('updateproduct/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <h2>Update Product</h2>
                <hr>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <label for="product_type">Product Type:</label>
                    <?php
                    $categories = DB::table('categories')->get();
                    ?>
                    <select id="product_type" name="product_type">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" <?php
                        if ($category->id == $product->category_id) {
                            echo "selected";
                        }?>>{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Title" class="form-control" required="required" value="{{$product->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="fName" placeholder="First Name" class="form-control" value="{{$product->fName}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="lName" placeholder="Last Name" class="form-control" value="{{$product->lName}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="pages" placeholder="Pages" class="form-control" value="{{$product->pages}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="price" placeholder="Price" class="form-control" value="{{$product->price}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" 
                        value="{{$product->image}}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Update product</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>