<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Image</title>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf');
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100%;
            /* background-color: #f2f2f2; */
            font-family: 'rpg_font', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            background-color: transparent;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        #label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            font-size: 16px;
            background-color: #444;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ba0000;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #0056b3;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <x-background></x-background>
    <div class="form-container">
        <h1>Image Generator</h1>
        <form method="POST" action="{{ route('generate.image') }}">
            @csrf
            <label id="label" for="description">Enter a Description:</label>
            <input type="text" name="description" id="description" required>
            <button type="submit">Generate Image</button>
        </form>
    </div>
</body>
</html>
