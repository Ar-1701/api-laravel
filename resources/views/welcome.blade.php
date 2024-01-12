<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <h1>Hello,API!</h1>
    <table class="table table-striped table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">id</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">City</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($stu as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- <th scope="row">{{ $item->id }}</th> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->city }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('.table');
        })
    </script>
</body>

</html>
