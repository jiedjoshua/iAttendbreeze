<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Verification</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/idverification.css">
</head>
<body>

	<center><img src="/img/Logo.png" width="120px"></center>
    <div class="user-form">
		<h1><b>Register</b></h1>
        <h2>Teacher's ID Verification</h2>
		<br>

        <!-- For the user -->
        <form action="{{ route('verifyteacherID') }}" method="POST">
            @csrf
		<align; center>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter last name" required>

            <label for="idnumber">ID Number</label>
            <input type="text" id="idnumber" name="id" placeholder="Enter ID number" required>
			
            <input type="submit" value="Next ≫" name="submit" id="submit">
        </form>
    </div>
</body>
</html>