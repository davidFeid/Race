<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>



    <div class="card-body">
        <h2>Invoice of your order</h2>
        <table class='table table-bordered'>
            <tr>
                <th>Order id</th>
                <th>Status</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Price</th>

                <th></th>
            </tr>
            </thead>
            <tbody>

             <tr>
                @foreach ($arreglo as $runner => $value)
                 <td>{{$value}}</td>

                 @endforeach
             </tr>

        </table>

</body>
</html>
