<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
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
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
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

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            background-color: #ba0000;
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
            <?php
                $books = [
                    ["Image" => "images/Book1.webp", "title" => "A Beginner's Guide", "price" => "$12.99"],
                    ["Image" => "images/Book2.webp", "title" => "A.Q.F.E Book1", "price" => "$15.99"],
                    ["Image" => "images/Book3.webp", "title" => "A.Q.F.E: Aethoria Chronicles", "price" => "$10.99"],
                ];

                foreach ($books as $index => $book) {
                    echo '<div class="card">
                            <div class="container">
                                <img src="' . $book["Image"] . '" alt="Books" class="item-images">
                                <h4><b>' . $book["title"] . '</b></h4>
                                <p>' . $book["price"] . '</p>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>

    <div class="section">
        <h2>Posters</h2>
        <p class="text-container">Decorate your space with stunning posters inspired by 'A Quest for Eternal Flame'. Each poster captures a moment or element from the game, bringing the magic and adventure of Aethoria to your walls.</p>
        <div class="item-container">
            <?php
                $posters = [
                    ["Image" => "images/Poster1.webp", "title" => "Choose thy path", "price" => "$10.99"],
                    ["Image" => "images/Poster2.webp", "title" => "Choose thy path2", "price" => "$12.99"],
                    ["Image" => "images/Poster3.webp", "title" => "Choose thy path3", "price" => "$11.99"],
                    ["Image" => "images/Poster4.webp", "title" => "Home Sweet Home", "price" => "$14.99"],
                    ["Image" => "images/Poster5.webp", "title" => "Phosphorescent Beauty", "price" => "$11.99"],
                    ["Image" => "images/Poster6.webp", "title" => "Dear Diary", "price" => "$11.99"],
                    ["Image" => "images/Poster7.webp", "title" => "Knight of the Fallen Star", "price" => "$14.99"],
                ];

                foreach ($posters as $index => $poster) {
                    echo '<div class="card">
                            <div class="container">
                                <img src="' . $poster["Image"] . '" alt="Posters" class="item-images">
                                <h4><b>' . $poster["title"] . '</b></h4>
                                <p>' . $poster["price"] . '</p>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>

    <div class="section">
        <h2>Shirts</h2>
        <p class="text-container">Wear your adventure with our exclusive T-shirts inspired by 'A Quest for Eternal Flame'. These shirts feature iconic designs and symbols from the game, perfect for any fan looking to showcase their love for Aethoria.</p>
        <div class="item-container">
            <?php
                $shirts = [
                    ["Image" => "images/Shirt1.webp", "title" => "Ready Dear Traveler? Tee", "price" => "$19.99"],
                    ["Image" => "images/Shirt2.webp", "title" => "Heart O Flame Tee", "price" => "$21.99"],
                    ["Image" => "images/Shirt3.webp", "title" => "Phosphorescent Tee", "price" => "$18.99"],
                    ["Image" => "images/Shirt4.webp", "title" => "Choice Thy Path Tee", "price" => "$18.99"],
                ];

                foreach ($shirts as $index => $shirt) {
                    echo '<div class="card">
                            <div class="container">
                                <img src="' . $shirt["Image"] . '" alt="Shirts" class="item-images">
                                <h4><b>' . $shirt["title"] . '</b></h4>
                                <p>' . $shirt["price"] . '</p>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>

    <div class="section">
        <h2>Accessories</h2>
        <p class="text-container">Enhance your style with accessories inspired by the mystical world of 'A Quest for Eternal Flame'. From elegant earrings to powerful pendants, each piece is designed to capture the essence of Aethoria's magic.</p>
        <div class="item-container">
            <?php
                $accessories = [
                    ["Image" => "images/charms1.webp", "title" => "Phosphorescent Bracelet", "price" => "$14.99"],
                    ["Image" => "images/charms2.webp", "title" => "Phosphorescent Earrings", "price" => "$9.99"],
                    ["Image" => "images/charms3.webp", "title" => "A.Q.E.F Stickers", "price" => "$7.99"],
                    ["Image" => "images/charms4.webp", "title" => "Phosphorescent Pendant", "price" => "$7.99"],
                ];

                foreach ($accessories as $index => $accessory) {
                    echo '<div class="card">
                            <div class="container">
                                <img src="' . $accessory["Image"] . '" alt="Accessories" class="item-images">
                                <h4><b>' . $accessory["title"] . '</b></h4>
                                <p>' . $accessory["price"] . '</p>
                            </div>
                        </div>';
                }
            ?>
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
