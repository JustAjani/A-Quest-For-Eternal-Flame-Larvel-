<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/87a5dc2df5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f2f2f2; /* Light gray background for contrast */
            height: 100px !important;
        }
        .icon-link:hover {
            transform: scale(1.3); /* Larger zoom effect on hover */
            transition: transform 0.3s; /* Smooth transition for the zoom effect */
            color: #f80000; /* Brightest red for hover effects */
        }
        header {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adds shadow to the header */
            border-bottom-right-radius: 10px; /* Rounded bottom right corner */
            border-bottom-left-radius: 10px; /* Rounded bottom left corner */
            background-color: transparent; /* Solid black for the dashboard */
            color: #ffffff; /* Change text color to white for visibility */
        }
        .icon-link {
            color: #ba0000; /* Darker red for normal state */
        }
        nav {
            background-color: transparent; /* Dark red for the navigation bar */
        }
        .search-container {
            background-color: transparent; /* Medium dark red for search bar */
            border: 2px solid #7c0000;
            backdrop-filter: blur(8px); /* Blur effect for search bar */
            border-radius: 10px; /* Rounded corners for search bar */
            flex-grow: 1; /* Makes the search bar container grow */
            display: flex; /* Enables flexbox for inner alignment */
            align-items: center; /* Centers the search input vertically */
            padding: 0 10px; /* Adds padding inside the search container */
        }
        .search-input {
            background-color: transparent; /* Ensures the input field is transparent */
            border: none; /* Removes the border of the input field */
            color: #fff; /* Sets the text color to white */
            width: 100%; /* Makes the input field take up all available space */
        }
        .active-link {
            color: #f80000; /* Bright red for active links */
        }
    </style>
</head>
<body class="h-full">
<div class="min-h-full">
    <nav>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-10 items-center justify-between">
                <div class="flex-shrink-0">
                    <!-- Logo can go here -->
                </div>
                <div class="flex items-center space-x-5 ml-10 search-container">
                <form action="{{ url('/search') }}" method="GET" style="display: flex; flex-grow: 1;">
                    <input type="text" name="query" placeholder="Search items..." class="search-input px-4 py-1 rounded-md" style="flex-grow: 1;">
                    <button type="submit" class="icon-link"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                    <a href="https://youtube.com" class="icon-link"><i class="fab fa-youtube"></i></a>
                    <a href="https://instagram.com" class="icon-link"><i class="fab fa-instagram"></i></a>
                    <a href="https://discord.com" class="icon-link"><i class="fab fa-discord"></i></a>
                    <a href="https://twitch.tv" class="icon-link"><i class="fab fa-twitch"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <header class="shadow">
    <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8 text-center">
        <div class="inline-block mt-2 space-x-4">
            <a href="/" class="icon-link {{ request()->is('/') ? 'active-link' : '' }}" ><i class="fas fa-home"></i></a>
            
            <!-- Conditional rendering based on user authentication -->
            @if(Auth::check())
                <a href="/Market Place" class="icon-link {{ request()->is('Market Place') ? 'active-link' : '' }}"><i class="fas fa-store"></i></a>
                @if(request()->is('Market Place') || request()->is('Market Place/*')) 
                    <a href="/add to cart" class="icon-link"><i class="fas fa-shopping-cart"></i></a>
                @endif
                <a href="/New Player Guide" class="icon-link {{ request()->is('New Player Guide') ? 'active-link' : '' }}"><i class="fas fa-info-circle"></i></a>
                <a href="/image_form" class="icon-link {{ request()->is('imageGen.image_form') ? 'active-link' : '' }}"><i class="fa-regular fa-image"></i></a>
                <a href="/external-project" class="icon-link {{ request()->is('Play') ? 'active-link' : '' }}" ><i class="fas fa-play"></i></a>
                <a href="/Contacts" class="icon-link {{ request()->is('Contacts') ? 'active-link' : '' }}"><i class="fa-solid fa-message"></i></a>
            @endif

            <!-- User authentication dependent links -->
            @if(Auth::check())
                <a href="/logout" class="icon-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="/login" class="icon-link"><i class="fas fa-sign-in-alt"></i></a>
                <a href="/register" class="icon-link"><i class="fas fa-user-plus"></i></a>
            @endif
        </div>
    </div>
</header>
    </header>
