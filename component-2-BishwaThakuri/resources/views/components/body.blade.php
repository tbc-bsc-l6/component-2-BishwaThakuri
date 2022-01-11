    <div class="container">

      <div class="wrap">
        <form method="GET" action="{{url()->current()}}">
         
          <div class="search">
            <input type="text" class="searchTerm" placeholder="Search by title" name="find">
            <button type="submit" class="searchButton">
              @svg('heroicon-o-search')
            </button>
          </div>
        </form>
      </div>

      @if(auth()->check())
        @if(auth()->user()->isAdmin())
          <a href="form" class="form-link">Add Product</a>
        @endif
      @endif

      @if(auth()->check())
        @if(auth()->user()->isWriter())
          <a href="form" class="form-link">Add Product</a>
        @endif
      @endif

      <?php session_start(); ?>
        @if(Session::has('product_delete'))
          <div class="alert alert-sucess" role="alert">
            {{Session::get('product_delete')}}
          </div>
        @endif

        <h3>BOOKS</h3>
        <table class="table">
          <thead class="table-dark">
            <tr>
                <th>IMAGE</th>
                <th class="sort">@sortablelink('TITLE')</th>
                <th>AUTHOR</th>
                <th>PAGES</th>
                <th class="sort">@sortablelink('PRICE')</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>

            <?php
            if (Request::get('sort') =='TITLE' && Request::get('direction') =='asc') {
              $books = DB::table('products')->orderBy('title', 'ASC')->where('category_id', 1)->paginate(10);
            }
            elseif (Request::get('sort') =='TITLE' && Request::get('direction') =='desc') {
              $books = DB::table('products')->orderBy('title', 'DESC')->where('category_id', 1)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='asc') {
              $books = DB::table('products')->orderBy('price', 'ASC')->where('category_id', 1)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='desc') {
              $books = DB::table('products')->orderBy('price', 'DESC')->where('category_id', 1)->paginate(10);
            }
            else
            {
              $books = DB::table('products')->where('category_id', 1)->paginate(10);
            }
            if (Request::get('find')) {
              $books = DB::table('products')->orWhere('title', 'like', '%'.Request::get('find'). '%')->where('category_id', 1)->paginate(10);
            }
            ?>
            @foreach ($books as $book)
              <tr>
                <th><img src="images/{{$book->image}}" alt="img" class="table-img"></th>
                <th>{{$book->title}}</th>
                <th>{{$book->fName.' '.$book->lName}}</th>
                <th>{{$book->pages}}</th>
                <th>{{$book->price}}</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th><a href="editproduct/{{$book->id}}">Update</a> / <a href="deleteproduct/{{$book->id}}">Delete</a></th>
                  @endif
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$books->links();}}

        <h3 class="sub-heading">CD</h3>
        <table class="table">
          <thead class="table-dark">
            <tr>
                <th>IMAGE</th>
                <th class="sort">@sortablelink('TITLE')</th>
                <th>ARTIST</th>
                <th>DURATION</th>
                <th class="sort">@sortablelink('PRICE')</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>
            <?php
            if (Request::get('sort') =='TITLE' && Request::get('direction') =='asc') {
              $cds = DB::table('products')->orderBy('title', 'ASC')->where('category_id', 2)->paginate(10);
            }
            elseif (Request::get('sort') =='TITLE' && Request::get('direction') =='desc') {
              $cds = DB::table('products')->orderBy('title', 'DESC')->where('category_id', 2)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='asc') {
              $cds = DB::table('products')->orderBy('price', 'ASC')->where('category_id', 2)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='desc') {
              $cds = DB::table('products')->orderBy('price', 'DESC')->where('category_id', 2)->paginate(10);
            }
            else
            {
              $cds = DB::table('products')->where('category_id', 2)->paginate(10);
            }
            if (Request::get('find')) {
              $cds = DB::table('products')->orWhere('title', 'like', '%'.Request::get('find'). '%')->where('category_id', 2)->paginate(10);
            }
            ?>
            @foreach ($cds as $cd)
              <tr>
                <th><img src="images/{{$cd->image}}" alt="img" class="table-img"></th>
                <th>{{$cd->title}}</th>
                <th>{{$cd->fName.' '.$cd->lName}}</th>
                <th>{{$cd->pages}}</th>
                <th>{{$cd->price}}</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th><a href="editproduct/{{$cd->id}}">Update</a> / <a href="deleteproduct/{{$cd->id}}">Delete</a></th>
                  @endif
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$cds->links();}}

        <h3 class="sub-heading">GAMES</h3>
        <table class="table">
          <thead class="table-dark">
            <tr>
                <th>IMAGE</th>
                <th class="sort">@sortablelink('TITLE')</th>
                <th>CONSOLE</th>
                <th>PEGI</th>
                <th class="sort">@sortablelink('PRICE')</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>
            <?php
            if (Request::get('sort') =='TITLE' && Request::get('direction') =='asc') {
              $games = DB::table('products')->orderBy('title', 'ASC')->where('category_id', 3)->paginate(10);
            }
            elseif (Request::get('sort') =='TITLE' && Request::get('direction') =='desc') {
              $games = DB::table('products')->orderBy('title', 'DESC')->where('category_id', 3)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='asc') {
              $games = DB::table('products')->orderBy('price', 'ASC')->where('category_id', 3)->paginate(10);
            }
            elseif (Request::get('sort') =='PRICE' && Request::get('direction') =='desc') {
              $games = DB::table('products')->orderBy('price', 'DESC')->where('category_id', 3)->paginate(10);
            }
            else
            {
              $games = DB::table('products')->where('category_id', 3)->paginate(10);
            }
            if (Request::get('find')) {
              $games = DB::table('products')->orWhere('title', 'like', '%'.Request::get('find'). '%')->where('category_id', 3)->paginate(10);
            }
            ?>
            @foreach ($games as $game)
              <tr>
                <th><img src="images/{{$game->image}}" alt="img" class="table-img"></th>
                <th>{{$game->title}}</th>
                <th>{{$game->fName.' '.$game->lName}}</th>
                <th>{{$game->pages}}</th>
                <th>{{$game->price}}</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th><a href="editproduct/{{$game->id}}">Update</a> / <a href="deleteproduct/{{$game->id}}">Delete</a></th>
                  @endif
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$games->links();}}
      </div>
  </div>

@if(auth()->check())
@if(auth()->user()->isAdmin())
<!--  Newsletter Section -->
    <section id="newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3>Get in Touch</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>
                </div>
            </div>
          <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="/newsletter" method="POST">
                      @csrf
                      <input type="email" name="email" placeholder="Enter your Email">
                      <input type="submit" value="Subscribe" name="Subscribe">

                    </form>
                    @error('email')
                      <span class="error">{{ $message}}</span>
                    @enderror
                    @if(Session::has('success'))
                      <div class="success" role="alert">
                        {{Session::get('success')}}
                      </div>
                    @endif
                </div>
          </div>
        </div>
    </section><!-- End newsletter Section-->
@endif
@endif

@if(auth()->check())
@if(auth()->user()->isWriter())
<!--  Newsletter Section -->
    <section id="newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3>Get in Touch</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>
                </div>
            </div>
          <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="/newsletter" method="POST">
                      @csrf
                      <input type="email" name="email" placeholder="Enter your Email">
                      <input type="submit" value="Subscribe" name="Subscribe">

                    </form>
                    @error('email')
                      <span class="error">{{ $message}}</span>
                    @enderror
                    @if(Session::has('success'))
                      <div class="success" role="alert">
                        {{Session::get('success')}}
                      </div>
                    @endif
                </div>
          </div>
        </div>
    </section><!-- End newsletter Section-->
@endif
@endif