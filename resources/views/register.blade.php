<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf'); 
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: rgba(0,0,0,0.5); /* Semi-transparent background */
            color: white;
            font-family: 'rpg_font';
        }

        form {
            background-color: rgba(255, 255, 255, 0.1); /* Transparent background for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        div {
            margin-bottom: 10px;
        }

        label {
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 4px;
            border: 2px solid #ccc;
            border-radius: 4px;
            background: transparent;
            color: white;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #ba0000;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <x-background></x-background>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Register</h1>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
        <div class="login-link">
            <a href="/login" style="color: #FFFFFF;">Already have an account? Login here.</a>
        </div>
    </form>
</body>
</html>
