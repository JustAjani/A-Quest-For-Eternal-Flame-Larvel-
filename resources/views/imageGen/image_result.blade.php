<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Image</title>
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
            background-color: #f2f2f2;
            font-family: 'rpg_font', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .image-container {
            width: 100%;
            max-width: 600px;
            background-color: transparent;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #ba0000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, box-shadow 0.3s;
            font-size: 18px;
        }

        a:hover {
            background-color: #0056b3;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <x-background></x-background>
    <div class="image-container">
        <h1>Generated Image</h1>
        @if ($imageUrl)
            <img src="{{ $imageUrl }}" alt="Generated Image">
        @else
            <p>Image could not be generated. Please try again.</p>
        @endif
        <a href="{{ route('image.form') }}">Generate another image</a>
    </div>
</body>
</html>
