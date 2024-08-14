<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->title }} - Product Details</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf');
        }
        
        body {
            font-family: 'rpg_font', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: rgba(0,0,0,0.5);
            color: #fff;
        }

        .container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            width: auto;
            max-width: 1200px;
            margin: 20px auto;
        }

        .image-section {
            flex: 1;
            margin-right: 20px;
            position: relative;
        }

        .details-section {
            flex: 2;
        }

        img {
            width: 100%;
            height: auto;
            display: block;
        }

        h1{
            font-size: 40px !important;
        }

        h1, p {
            color: #fff;
        }

        #button, #checkout-button{
            width: auto;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #ba0000;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #button:hover, #checkout-button:hover {
            background-color: #0056b3;
        }

        .price {
            font-size: 24px;
            color: #ba0000;
        }

        .image-nav {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: 30px;
            height: 30px;
            background-color: #fff;
            color: #333;
            border: none;
            border-radius: 15px;
            text-align: center;
            line-height: 30px;
            transform: translateY(-50%);
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<body>
    <x-background></x-background>
    <x-nav></x-nav>
    <div class="container">
        <div class="image-section">
            <button class="image-nav prev" onclick="changeImage(-1)">❮</button>
            <button class="image-nav next" onclick="changeImage(1)">❯</button>
            <img id="mainImage" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
        </div>
        <div class="details-section">
            <h1>{{ $item->title }}</h1>
            <p>{{ $item->description }}</p>
            <p class="price">${{ number_format($item->price) }}</p> 
            <form action="{{'/create-checkout-session'}}" method="POST">
            @csrf
            <button id="checkout-button">Pay with Stripe</button>
            </form>
            <button id="button">Add to Cart</button>
            
        </div>
    </div>

    <script>
        let currentImageIndex = 0;
        const images = [
            "{{ asset($item->image) }}",
            "{{ $item->additional_image1 ? asset($item->additional_image1) : 'default.jpg' }}",
            "{{ $item->additional_image2 ? asset($item->additional_image2) : 'default.jpg' }}"
        ];

        function changeImage(dir) {
            currentImageIndex += dir;
            if (currentImageIndex >= images.length) currentImageIndex = 0;
            if (currentImageIndex < 0) currentImageIndex = images.length - 1;
            document.getElementById('mainImage').src = images[currentImageIndex];
        }

        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function () {
            fetch('/create-checkout-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    itemId: '{{ $item->id }}'
                })
            }).then(function (response) {
                return response.json();
            }).then(function (session) {
                return stripe.redirectToCheckout({ sessionId: session.id });
            }).catch(function (error) {
                console.error('Error:', error);
                alert('Error processing payment');
            });
        });
    </script>
</html>
