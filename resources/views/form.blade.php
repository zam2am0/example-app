<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="/form/submit" method="POST"> 
        @csrf <!--هذا عشان السكيورتي أنه جاي الركويست من نفس الأبيكيشن-->

        <label for="">Name</lable>
        <input type="text" name="name" >
        <br>

        <label for="">Email</lable>
        <input type="text" name="email" >
        <br>

        <label for="">Password</lable>
        <input type="password" name="password" >
        <br>

        <input type="submit" value="Submit">

    </form>

    
</body>
</html>