<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Edit Product</h3>
    <form action="/products/update/{{$record->id}}" method="POST"> 
        @csrf 

        <label for="">Name</lable>
        <input type="text" name="name" value="{{$record->name}}">
        <br>

        <label for="">Price</lable>
        <input type="text" name="price" value="{{$record->price}}">
        <br>

        <label for="">Status</lable>
        <input type="text" name="is_active" value="{{$record->is_active}}">
        <br>

        <input type="submit" value="Submit">

    </form>
    
</body>
</html>