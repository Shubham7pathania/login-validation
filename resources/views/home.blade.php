<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @if (auth()->user())
    <div class="container-fluid d-flex align-items-center justify-content-between px-5 mt-3 mb-3">
        <h1>Welcome : {{ auth()->user()->name }}</h1>
        <p class="fs-6"><a href="{{ route('logout') }}">Logout</a></p>
    </div>

    @endif


@if (auth()->user())
    <div class="container text-start">
        <h3 class="mt-4 mb-4">Your details</h3>
        <table class="table table-success">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Hobbies</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_details->hobbies ?? '-'  }}</td>
                    <td>{{ $user->user_details->gender ?? '-'  }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->user_details->company ?? '-'  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="container mt-4 justify-content-end align-items-center d-flex">
    <ul class="d-flex ">
        <li class="mt-2 mx-4 mb-2 list-unstyled"><a href="{{ route('register.show') }}">Register User</a></li>
        <li class="mt-2 mx-4 mb-2 list-unstyled"><a href="{{ route('login.show') }}">Login User</a></li>
    </ul>

</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

