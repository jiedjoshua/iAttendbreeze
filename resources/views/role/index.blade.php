<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/welcome.css">
</head>
<body>

    <img src="/img/Logo.png" class="logo">
    <div class="user-form">
        <h1><b>Login</b></h1>
        <h2>Select One</h2><br>
        <div class="image-container">
           <a href="{{ route('showTeacher') }}"> <img src="/img/Teacher.png" alt="Teacher"> </a>
           <a href="{{ route('showParent') }}"><img src="/img/Parent.png" alt="Parent"> </a>
        </div>
    </div>
</body>
</html>