<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%; /* Ensures the body takes full viewport height */
            width: 100%; /* Ensures the body takes full viewport width */
        }

        body {
            background-color: #f2f2f2; /* Light background color */
            position: relative; /* Needed for absolute positioning inside */
            /* overflow: hidden;  */
        }

        .video-background {
            position: fixed; /* Fixed position to cover all the page even when scrolling */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Stay behind all content */
            overflow: hidden;
        }

        .video-background video {
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            object-fit: cover; /* Cover the entire area without losing aspect ratio */
        }

        .content {
            position: relative; /* Above the video */
            z-index: 10; /* Higher z-index to stay on top */
            padding: 20px;
            color: white; /* For contrast against the likely dark video */
        }
    </style>
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="{{ asset('video/fire_sparks_with_smoke_2.mp4') }}" type="video/mp4">
        </video>
    </div>
</body>
</html>
