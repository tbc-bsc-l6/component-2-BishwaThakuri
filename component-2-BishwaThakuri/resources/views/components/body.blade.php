      <div class="container">
      @if(auth()->check())
        @if(auth()->user()->isAdmin())
          <a href="form">Add Product</a>
        @endif
      @endif

      @if(auth()->check())
        @if(auth()->user()->isWriter())
          <a href="form">Add Product</a>
        @endif
      @endif

      <?php session_start(); ?>
        @if(Session::has('product_delete'))
          <div class="alert alert-sucess" role="alert">
            {{Session::get('product_delete')}}
          </div>
        @endif

        <h3>BOOKS</h3>
        <table class="table table-border">
          <thead class="table-dark">
            <tr>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>PAGES</th>
                <th>PRICE</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>

            <?php
            $books = DB::table('products')->where('category_id', 1)->paginate(10);
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
                <th>ARTIST</th>
                <th>TITLE</th>
                <th>DURATION</th>
                <th>PRICE</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>
            <?php
            $cds = DB::table('products')->where('category_id', 2)->paginate(10);
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
                <th>CONSOLE</th>
                <th>TITLE</th>
                <th>PEGI</th>
                <th>PRICE</th>
                @if(auth()->check())
                  @if(auth()->user()->isAdmin())
                  <th>ACTION</th>
                  @endif
                @endif
            </tr>
          </thead>
          <tbody>
            <?php
            $games = DB::table('products')->where('category_id', 3)->paginate(10);
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