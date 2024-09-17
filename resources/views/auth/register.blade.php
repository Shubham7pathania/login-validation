<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container w-75 d-flex mt-5 d-flex align-items-center justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="container w-75 w-md-75 d-flex align-items-center justify-content-center">
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" required>
            </div>

            <div class="mb-3">
                <label for="hobbies" class="form-label">Hobbies</label>
                <input type="text" class="form-control" name="hobbies" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="number" class="form-control" name="phone" oninput="this.value = this.value.slice(0,10)" required>
              <div id="emailHelp" class="form-text">We'll never share your phone number with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" name="gender">
                  <option disabled selected >Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" name="company" required>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="conpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mb-3">
                <div class="form-text mt-2">Already have an acount? <a href="{{ route('login.show') }}">Login</a></div>
            </div>
          </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
