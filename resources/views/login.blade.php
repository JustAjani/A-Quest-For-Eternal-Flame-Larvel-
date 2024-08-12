<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .register-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<x-background></x-background>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login</h1>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        <div class="register-link">
            <a href="/register" style="color: #FFFFFF;">Don't have an account? Register here.</a>
        </div>
    </form>
</body>
</html>
