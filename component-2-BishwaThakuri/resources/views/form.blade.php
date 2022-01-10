<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>


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
                        <input type="text" name="lName" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="pages" placeholder="Pages" class="form-control">
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