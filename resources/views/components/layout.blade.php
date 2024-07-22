<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Quest For Eternal Flame</title>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf'); /* Corrected the file name, make sure it matches your file */
        }
        *{
            margin: 0;
            padding: 0;
        }

        body{
            height: 100%;
            background-color: #f2f2f2; /* Background color adjusted for visibility */
        }

        .video-background {
            position: absolute; /* Covering the whole screen */
            bottom: 0; /* Start from the top */
            left: 0; /* Start from the left */
            min-width: 100%;
            min-height: 100vh;
            /* width: auto;
            height: auto; */
            z-index: -100; /* Behind everything */
            overflow: hidden;
        }

        .text-container {
            position: absolute ; 
            top: 85%; /* Position it 10% from the top */
            left: 10%; /* 5% from the left */
            width: 80%; /* 90% of its container width */
            background: rgba(62, 0, 0, 0.8); /* Dark red with opacity */
            color: #ffffff; /* White text color */
            padding: 20px; /* Padding for spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            font-family: 'rpg_font', sans-serif; /* Using the RPG font, with a fallback */
        }

        h2 {
            font-size: 30px; /* Larger font size for headings */
            margin-top: 0; /* Remove top margin */
            text-align: center;
        }

        p {
            font-size: 16px; /* Slightly larger font size for readability */
            line-height: 1.6; /* Improved line height for better reading */
        }
    </style>
</head>
<body>
    <x-nav></x-nav> 
    <x-video></x-video>
    
    <div class="video-background">
        <video autoplay muted loop style="width:100%; height: 100%;" id="bgVideo">
            <source src="{{ asset('video/fire_sparks_with_smoke_2.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="text-container">
       <h2>A Quest For Eternal Flame</h2>
       <p>
           You are a young adventurer from the small village of Eldoria, 
           embarking on a quest to retrieve the Eternal Flame 
           from the ancient and perilous Mount Pyra. Legend says the flame grants 
           immense power and eternal prosperity to the village that possesses it. 
       </p>
    </div>

    <x-card></x-card>
</body>
</html>
