<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loading</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<body>
    <!-- Video Loading Screen HTML -->
    <div id="loadingScreen">
        <video id="loadingVideo" autoplay loop muted playsinline style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -100; background-size: cover;">
            <!-- Video sources will be handled by JavaScript -->
        </video>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 100;">
            <img src="{{ URL::asset('images/your_logo.png') }}" alt="Loading...">
            <p class="loading-message" style="color: white;">Loading...</p>
        </div>
    </div>

    <!-- Include Laravel Echo and Pusher -->
    <script src="{{ asset('js/transition.js') }}"></script>
</body>
</html>
