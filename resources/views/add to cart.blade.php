<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <script src="https://kit.fontawesome.com/87a5dc2df5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .details-section {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            background-color: rgba(0,0,0,0.7);
        }

        h1, h2, p {
            color: #fff;
        }

        h1 {
            font-size: 36px !important;
            margin-bottom: 20px;
        }

        #checkout-button, #clear-cart-button {
            width: auto;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #ba0000;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        #checkout-button:hover, #clear-cart-button:hover {
            background-color: #0056b3;
        }

        .price {
            font-size: 24px;
            color: #ba0000;
        }
    </style>
</head>
<body>
<x-nav></x-nav>
<x-background></x-background>
<div class="container">
    <h1>Your Cart</h1>
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            <div class="details-section">
                <h2>{{ $details['name'] }}</h2>
                <p class="price">${{ number_format($details['price']) }}</p>
                <p>Quantity: {{ $details['quantity'] }}</p>
                <p>Total: ${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
            </div>
        @endforeach
        <button id="checkout-button">Checkout</button>
        <button id="clear-cart-button">Clear Cart</button>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var checkoutButton = document.getElementById('checkout-button');
    var clearCartButton = document.getElementById('clear-cart-button');

    clearCartButton.addEventListener('click', function () {
        fetch('/clear-cart', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.text();
        })
        .then(function () {
            window.location.reload();  // Reload the page to reflect the empty cart
        })
        .catch(function (error) {
            console.error('Error:', error);
            alert('There was an error clearing the cart. Please try again.');
        });
    });

    checkoutButton.addEventListener('click', function () {
        // Disable the button to prevent multiple clicks
        checkoutButton.disabled = true;
        checkoutButton.textContent = 'Processing...';

        fetch('/create-checkout-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json();
        })
        .then(function (session) {
            var stripe = Stripe('{{ env("STRIPE_KEY") }}');
            stripe.redirectToCheckout({ sessionId: session.id }).then(function (result) {
                // If redirectToCheckout fails due to a network error, re-enable the button
                if (result.error) {
                    alert(result.error.message);
                    checkoutButton.disabled = false;
                    checkoutButton.textContent = 'Checkout';
                }
            });
        })
        .catch(function (error) {
            console.error('Error:', error);
            alert('There was an error. Please try again.');
            checkoutButton.disabled = false;
            checkoutButton.textContent = 'Checkout';
        });
    });
});
</script>
</body>
</html>
