    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf');
        }
        
        * {
            margin: 0;
            padding: 0;
        }

        body {
            height: 100%;
            background-color: #f2f2f2;
            font-family: 'rpg_font', sans-serif;
        }

        .text-container {
            position: absolute; 
            top: 100vh; /* Position it 100% from the top */
            left: 10%; /* 10% from the left */
            width: 80%; /* 80% of its container width */
            background: transparent;
            color: #ffffff; /* White text color */
            padding: 20px; /* Padding for spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Shadow for depth */
        }

        #cardContainer {
            margin-top: 500px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
            font-family: 'rpg_font';
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 100%;
            max-width: 600px;
            margin: 20px;
            padding: 10px;
            background-color: transparent;
            color: white;
            /* border: 1px solid #ba0000; */
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

        .card video {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="cardContainer">
        <?php
            $cards = [
                ["video" => "video/17.mp4", "title" => "Explore Unique Paths", "description" => "Discover new and exciting paths in every direction. Unveil the mysteries that lie within and make choices that shape your journey."],
                ["video" => "video/43.mp4", "title" => "Engaging Strategic Combat", "description" => "Experience heart-pounding strategic combat that challenges your tactical skills. Adapt and overcome every adversary with cunning and prowess."],
                ["video" => "video/54.mp4", "title" => "Are You Willing To Challenge All Odds?", "description" => "Step up and face the ultimate challenges. Push your limits and test your resilience in the face of overwhelming odds. Are you ready for the test?"],
                ["video" => "video/37.mp4", "title" => "Manage Your Inventory", "description" => "Master the art of inventory management to ensure your survival. Strategically organize your gear, ration your supplies, and make critical decisions that will aid you in your quest. Will you optimize your resources and emerge victorious?"],
            ];

            foreach ($cards as $index => $card) {
                echo '<div class="card">
                        <div class="container">
                            <video autoplay loop muted>
                                <source src="' . $card["video"] . '" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <h4><b>' . $card["title"] . '</b></h4>
                            <p>' . $card["description"] . '</p>
                        </div>
                    </div>';
            }
        ?>
    </div>
