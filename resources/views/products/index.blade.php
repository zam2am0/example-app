<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach($records as $record)
        <tr>
            <td>{{$record->id}}</td>
            <td>{{$record->name}}</td>
            <td>{{$record->price}}</td>
            <td>
                @if($record->is_active == 1 )
                    Active
                @else
                    InActive
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>