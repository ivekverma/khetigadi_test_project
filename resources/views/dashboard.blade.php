<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 card p-4">
        <h1>dashboard</h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Name</th>
                <td>{{ ucfirst($user->first_name ?? '') }} {{ ucfirst($user->last_name ?? '') }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>+{{ $user->country->phonecode ?? 1 }} {{ $user->phone }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $user->country->name }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $user->state->name }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $user->city->name }}</td>
            </tr>
        </table>
        <a href="/" class="btn btn-primary mr-0">Go to login</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
