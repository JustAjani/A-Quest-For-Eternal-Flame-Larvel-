<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Quest For Eternal Flame</title>
    <script src="{{ asset('js/animation.js') }}"></script>
    <style>
        @font-face {
            font-family: 'rpg_font';
            src: url('rpg.ttf'); /* Corrected the file name, make sure it matches your file */
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

        h2 {
            position: relative;
            top: 10vh;
            font-size: 50px !important; /* Larger font size for headings */
            margin-top: 0; /* Remove top margin */
            text-align: center;
            font-family: 'rpg_font';
            color: #ffffff;
        }

        .secondary-text-container {
            position: absolute;
            top: 155vh; /* Position it 70% from the top */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Adjust for exact centering */
            width: 80%; /* 80% of its container width */
            text-align: center; /* Center the text */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Shadow for depth */
        }

        p {
            font-size: 18px; /* Slightly larger font size for readability */
            line-height: 1.6; /* Improved line height for better reading */
            font-family: 'rpg_font';
            color: #ffffff;
        }

        .leaderboard {
            position: absolute;
            top: 340vh; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Adjust for exact centering */
            width: 90%; /* Increase width to 90% */
            max-width: 1000px; /* Increase max-width to background: rgba(62, 0, 0, 0.8); Dark red with opacity1000px */
            background-color: transparent;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            padding: 20px;
            z-index: 100;
            box-shadow: 2px 2px black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 20px;
            border-bottom: 1px solid #ddd; /* Light grey line for some contrast */
        }

        th {
            background-color: #ba0000;
        }
    </style>
</head>
<body>
    <x-nav></x-nav> 
    <x-video></x-video>
    <x-background></x-background>
    <h2>A Quest For Eternal Flame</h2>
    <div class="text-container">
       <p>
       You are a young adventurer from the quaint village of Eldoria, where the whispers of legends and tales of bravery fill the air. 
       Your journey begins as you set forth on an epic quest to retrieve the mythical Eternal Flame, 
       nestled within the treacherous heights of ancient Mount Pyra. This legendary flame, shrouded in mystery and guarded 
       by formidable challenges, is said to bestow immeasurable power and unending prosperity upon the village that holds its radiant glow. 
       With courage in your heart and the hopes of Eldoria resting on your shoulders, you embark on this perilous journey, ready to face whatever trials
       and tribulations await. Will you conquer the odds and bring eternal glory to your homeland?
       </p>
    </div>

    <h2 style="top: 50vh;">Embark on A Journey</h2>
    <div class="secondary-text-container">
        <p>
            Prepare yourself for an epic adventure filled with mystery, danger, and excitement. 
            Traverse through uncharted lands, face formidable foes, and uncover ancient secrets. 
            Your quest awaits, brave adventurer. 
            Will you rise to the challenge and bring glory to your name?
        </p>
    </div>
    
    <x-card></x-card>

    <h2 style="top: 3vh;">Leaderboard</h2>
    <div class="leaderboard">
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Player Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>5000</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
