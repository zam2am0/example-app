<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/file/storage" method="POST" enctype="multipart/form-data"> 
        @csrf

        <input type="file" name="logo"> <!--name -> لازم يكون نفس الاسم بموجود في فايل في الكونترولر-->
        
        <input type ="submit">
    </form>
    
</body>
</html>