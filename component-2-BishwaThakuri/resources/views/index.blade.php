<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
    <h3>BOOKS</h3>
    <table class="table">
      <thead class="table-dark">
        <tr>
            <th>AUTHOR</th>
            <th>TITLE</th>
            <th>PAGES</th>
            <th>PRICE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <th>J.K Rowelling</th>
        <th>Harry Potter</th>
        <th>505</th>
        <th>20</th>
        <th>X</th>
        <th>X</th>
      </tbody>
    </table>

    <h3>CD</h3>
    <table class="table">
      <thead class="table-dark">
        <tr>
            <th>ARTIST</th>
            <th>TITLE</th>
            <th>DURATION</th>
            <th>PRICE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>

    <h3>GAMES</h3>
    <table class="table">
      <thead class="table-dark">
        <tr>
            <th>CONSOLE</th>
            <th>TITLE</th>
            <th>PEGI</th>
            <th>PRICE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
    <br>
    <br>
        <h2>ADD NEW PRODUCT</h2>
         <form action="./index.php" method="post">
          <label for="producttype">Product Type:</label>
          <select id="producttype" name="producttype">
                <option value="book">Book</option>
                <option value="cd">CD</option>
                <option value="game">Game</option>
          </select> 
          <br />
          <br />
         <label for="name">Author / Artist / Console:</label><br />
         <label for="fname">First Name:</label>
           <input type="text" id="fname" name="fname"><br />
          <label for="sname">Main Name / Surname:</label>
           <input type="text" id="sname" name="sname">
           <br />
           <br />
         <label for="title">Title:</label>
           <input type="text" id="title" name="title">
           <br />
           <br />
         <label for="pages">Pages / Duration / PEGI:</label>
           <input type="text" id="pages" name="pages">
           <br />
           <br />
          <label for="price">Price:</label>
           <input type="text" id="price" name="price">
           <br />
           <br /> 
           <input type="submit" value="Submit">
        </form>

    </div>

</body>
</html>