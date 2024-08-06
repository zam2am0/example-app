<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Create Products</h3>
    <form action="/products/store" method="POST"> 
        @csrf 

        <label for="">Name</lable>
        <input type="text" name="name" >
        <br>

        <label for="">Price</lable>
        <input type="text" name="price" >
        <br>

        <input type="submit" value="Submit">

    </form>
    
</body>
</html>