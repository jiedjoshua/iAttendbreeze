<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

    <center><img src="/img/Logo.png" width="120px"></center>
    <div class="user-form">
        <h1><b>Login</b></h1>
        <br>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus autocomplete="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="********" required autocomplete="current-password">

            <input type="reset" value="Forgot Password?" name="reset" id="reset">

            <button id="login" type="submit">Login</button>
        </form>

        <a href="{{ route('role.index') }}">
            <button id="register" type="button">Register</button>
        </a>
    </div>
</body>
</html>
