<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>


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
                        <option value="{{$category->id}}">{{$category->category}}</option>
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