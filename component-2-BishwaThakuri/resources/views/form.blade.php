<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg">
	<div class="container form-container">
		<h2 class="heading">ADD NEW PRODUCT</h2>

    	<form action="./index.php" method="post">
    		<div class="input-group mb-3">
			  <label class="input-group-text" for="inputGroupSelect01">Product Type:</label>
			  <select class="form-select" id="inputGroupSelect01">
			    <option value="book">Book</option>
			    <option value="cd">CD</option>
			    <option value="game">Game</option>
			  </select>
			</div>

            <input type="text" name="title" placeholder="Title" class="form-control">
            <p class="error"></p>
            <input type="text" name="fname" placeholder="First Name(Optional)" class="form-control">
            <input type="text" name="sname" placeholder="Surname/Brand" class="form-control">
            <input type="text" name="pages" placeholder="Pages/Duration/PEGI" class="form-control">
            <input type="text" name="price" placeholder="Price" class="form-control">
            <button type="Submit" value="Submit" class="submit">Submit</button>
           
        </form>
    </div>

</body>
</html>