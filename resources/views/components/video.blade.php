<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
        font-family: 'rpg_font';
        src: url('rpg.ttf.ttf');
        }

        body {
            background-color: #f2f2f2; 
        }
        .video-container {
            position: relative;
            overflow: hidden;
            width: 80%; 
            height: 400px; 
            border-radius: 10px; 
            border: 1px solid #7c0000; 
            box-shadow: 0 4px 6px rgba(62, 0, 0, 0.5); 
            background-color: #ba0000; 
            margin: auto; 
            display: flex;
            align-items: center; 
            justify-content: center; 
        }
        #videoPlayer {
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .video-title {
            position: absolute;
            z-index: 10;
            font-family: 'rpg_font';
            color: #7c0000; 
            font-size: 50px; 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6); 
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="video-container">
        <span class="video-title">Quest For Eternal Flame</span>
        <video id="videoPlayer" autoplay muted></video>
    </div>

    <script>
        const videoPlayer = document.getElementById('videoPlayer');
        const videoSources = [
            '{{ URL::asset("video/4.mp4") }}',
            '{{ URL::asset("video/6.mp4") }}',
            '{{ URL::asset("video/8.mp4") }}',
            '{{ URL::asset("video/53.mp4") }}',
            '{{ URL::asset("video/40.mp4") }}',
            '{{ URL::asset("video/10.mp4") }}'
        ];
        let videoIndex = 0;

        videoPlayer.src = videoSources[0]; // Start with the first video
        videoPlayer.addEventListener('ended', changeVideo);

        setInterval(changeVideo, 4000); // Change video every 4 seconds regardless of video length

        function changeVideo() {
            videoIndex = (videoIndex + 1) % videoSources.length; // Increment video index or reset if at the end
            videoPlayer.src = videoSources[videoIndex];
            videoPlayer.play(); // Play the next video
        }
    </script>
</body>
</html>
