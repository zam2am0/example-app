<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/excel/import" method="POST" enctype="multipart/form-data"> 
        @csrf 

        <label for="">Excel file</lable>
        <input type="file" name="excel" >
        <br>

        <input type="submit" value="Submit">

    </form>
    
</body>
</html>