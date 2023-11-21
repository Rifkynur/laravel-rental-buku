<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .container{
        height: 100vh;
    }
    .form{
        width: 500px;
    }
</style>
<body>
<div class="container d-flex justify-content-center align-items-center">
    <div class="form border border-2 border-black p-3 shadow rounded">
        <form action="" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <h3 class="fw-bold text-center">Register Form</h3>
            <div class="username">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" name="user_name" required>
            </div>
            <div class="password">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="phone">
                <label for="password" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="password" class="form-control" required>
            </div>
            <div class="phone">
                <label for="password" class="form-label">Address</label>
                <textarea name="address" id="address" cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="submit mt-2">
                <button type="submit" class="form-control btn btn-primary">Register</button>
            </div>
            <div class="login text-center mt-2">
               <span>Have an account?? <a href="{{ url('/login') }}" >Login</a></span> 
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>