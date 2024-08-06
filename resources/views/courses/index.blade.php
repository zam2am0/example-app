<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Course List</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @foreach ($records as $record)
            <tr>
                <th>{{$record->id}}</th>
                <th>{{$record->name}}</th>
                <th>{{$record->price}}</th>
                <th>
                    <form action="/order" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$record->id}}">
                        <button type="submit">Buy now</button>
                    </form>
                </th>
            </tr>
        
        @endforeach
    </table>
    
</body>
</html>