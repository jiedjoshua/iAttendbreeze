
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/create_account.css">
</head>
<body>

	<center><img src="/img/Logo.png" width="120px"></center>
    <div class="user-form">
		<h1><b>Register</b></h1>
        <h2>Create Account</h2>
		

        <!-- For the user -->
        <form action="{{ route('storeParent') }}" method="POST">
		@csrf
       
            <label for="email">Email</label>
            <input type="text" id="username" name="email" placeholder="example@example.com" :value="old('email')" required autocomplete="username">
            @error('email')
                <p class="error-message" style="color: red; font-size:small; margin-top:0%;">{{ $message }}</p>
                <style>
                    #username{
                        border-color: red;
                    }
                </style>
            @enderror
           
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="********" required autocomplete="new-password">
            @error('password')
                <p class="error-message" style="color: red; font-size:small; margin-top:0%; ">{{ $message }}</p>
                <style>
                    #password{
                        border-color: red;
                    }
                </style>
            @enderror
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="password_confirmation" placeholder="********" required autocomplete="new-password">
			
			<button id="submit" type="create">Create Account</button>
        </form>
    </div>
</body>
</html>
