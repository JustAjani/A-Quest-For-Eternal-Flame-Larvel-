<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf');
        }
        
        *{
            margin: 0;
            padding: 0;
        }

        body {
            height: 100%;
            background-color: #f2f2f2;
            font-family: 'rpg_font', sans-serif;
        }

        #cardContainer {
            margin-top: 300px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 240px;
            margin: 20px;
            padding: 10px;
            background-color: rgba(62, 0, 0, 0.8); /* Dark red background matching text container */
            color: white;
            border: 1px solid #ba0000;
            border-radius: 10px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            background-color: #ba0000;
        }

        .container {
            padding: 2px 16px;
        }

        .card img {
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
                ["image" => "https://via.placeholder.com/150", "title" => "Card 1", "description" => "Some example text for the first card."],
                ["image" => "https://via.placeholder.com/150", "title" => "Card 2", "description" => "Some example text for the second card."],
                ["image" => "https://via.placeholder.com/150", "title" => "Card 3", "description" => "Some example text for the third card."],
            ];

            foreach ($cards as $index => $card) {
                echo '<div class="card">
                        <div class="container">
                            <img src="' . $card["image"] . '" alt="Card Image">
                            <h4><b>' . $card["title"] . '</b></h4>
                            <p>' . $card["description"] . '</p>
                        </div>
                    </div>';
            }
        ?>
    </div>
</body>
</html>
