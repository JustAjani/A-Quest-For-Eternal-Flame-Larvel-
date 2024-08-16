<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <script src="{{ asset('js/animation.js') }}"></script>
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
        }

        h2 {
            color: white;
            font-family: 'rpg_font';
            text-align: center;
            margin-top: 20px;
            font-size: 40px !important;
        }

        .section {
            margin-top: 20px;
        }
         
        .text-container {
            margin: 20px auto;
            width: 80%; /* 80% of its container width */
            background: transparent;
            color: #ffffff; /* White text color */
            padding: 20px; /* Padding for spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            text-align: center;
            font-size: 20px;
        }

        .item-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the cards horizontally */
            gap: 40px; /* Add gap between the cards */
            padding: 20px;
            font-family: 'rpg_font';
            text-align: center;
        }

        .card {
            transition: 0.3s;
            width: 100%;
            max-width: 220px; /* Make the cards smaller */
            margin: 10px; /* Reduce margin for closer cards */
            padding: 10px;
            background-color: transparent;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            border-radius: 10px;
            text-align: center;
        }

        .card {
            transition: transform 0.3s, opacity 0.3s; /* Smooth transitions for the transform and opacity */
            will-change: transform, opacity; /* Optimize for animations */
            opacity: 0; /* Start with cards hidden */
        }

        .container {
            padding: 2px 16px;
        }

        .item-images {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Slider Styles */
        .slider {
            position: relative;
            width: 90%;
            height: 300px;
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slides img {
            width: 100%;
            border-radius: 10px;
        }

        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .prev, .next {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        h2, .text-container, .card, .slider {
            transition: transform 0.3s, opacity 0.3s; /* Smooth transitions for the transform and opacity */
            will-change: transform, opacity; /* Optimize for animations */
            opacity: 0; /* Start hidden */
            transform: translateY(50px); /* Start slightly lowered */
        }

    </style>
</head>
<body>
    <x-nav></x-nav>
    <x-background></x-background>
    
    <div class="slider">
        <div class="slides">
            <img src="images/slider1.webp" alt="Slider Image 1">
            <img src="images/slider2.webp" alt="Slider Image 2">
            <img src="images/slider3.webp" alt="Slider Image 3">
            <img src="images/slider4.webp" alt="Slider Image 4">
        </div>
        <div class="navigation">
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>

    <div class="section">
        <h2>Books</h2>
        <p class="text-container">Explore a collection of enchanting books that dive deep into the lore and adventures of Aethoria. Each book offers a unique journey, unraveling the mysteries and stories of this fantastical world.</p>
        <div class="item-container">
            @foreach($merch as $item)
                @if($item->type === 'book')
                    <div class="card">
                        <div class="container">
                            <img src="{{ asset($item->image) }}" alt="Books" class="item-images">
                            <h4><b>{{ $item->title }}</b></h4>
                            <p>${{ $item->price }}</p>
                            <a href="/Market Place/{{ $item->id }}">View Details</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <div class="section">
        <h2>Posters</h2>
        <p class="text-container">Decorate your space with stunning posters inspired by 'A Quest for Eternal Flame'. Each poster captures a moment or element from the game, bringing the magic and adventure of Aethoria to your walls.</p>
        <div class="item-container">
            @foreach($merch as $item)
                @if($item->type === 'poster')
                    <div class="card">
                        <div class="container">
                            <img src="{{ asset($item->image) }}" alt="Posters" class="item-images">
                            <h4><b>{{ $item->title }}</b></h4>
                            <p>${{ $item->price }}</p>
                            <a href="/Market Place/{{ $item->id }}">View Details</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <div class="section">
        <h2>Shirts</h2>
        <p class="text-container">Wear your adventure with our exclusive T-shirts inspired by 'A Quest for Eternal Flame'. These shirts feature iconic designs and symbols from the game, perfect for any fan looking to showcase their love for Aethoria.</p>
        <div class="item-container">
            @foreach($merch as $item)
                @if($item->type === 'shirt')
                    <div class="card">
                        <div class="container">
                            <img src="{{ asset($item->image) }}" alt="Shirts" class="item-images">
                            <h4><b>{{ $item->title }}</b></h4>
                            <p>${{ $item->price }}</p>
                            <a href="/Market Place/{{ $item->id }}">View Details</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <div class="section">
        <h2>Accessories</h2>
        <p class="text-container">Enhance your style with accessories inspired by the mystical world of 'A Quest for Eternal Flame'. From elegant earrings to powerful pendants, each piece is designed to capture the essence of Aethoria's magic.</p>
        <div class="item-container">
            @foreach($merch as $item)
                @if($item->type === 'accessory')
                    <div class="card">
                        <div class="container">
                            <img src="{{ asset($item->image) }}" alt="Accessories" class="item-images">
                            <h4><b>{{ $item->title }}</b></h4>
                            <p>${{ $item->price }}</p>
                            <a href="/Market Place/{{ $item->id }}">View Details</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    
    
    <script>
        let slideIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = slides.children.length;

        function showSlide(index) {
            slides.style.transform = `translateX(${-index * 100}%)`;
        }

        function moveSlide(n) {
            slideIndex = (slideIndex + n + totalSlides) % totalSlides;
            showSlide(slideIndex);
        }

        // Auto-scroll slides every 3 seconds
        setInterval(() => {
            moveSlide(1);
        }, 3000);
    </script>
</body>
</html>
