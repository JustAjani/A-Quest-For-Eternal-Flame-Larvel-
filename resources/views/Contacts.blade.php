<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<style>
    @font-face {
        font-family: 'rpg_font';
        src: url('rpg.ttf');
    }

    body {
        font-family: 'rpg_font', Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #0f0f0f; /* Dark background for a chat app */
        color: #ba0000; /* White text for better readability */
    }

    h1 {
        text-align: center;
        font-size: 40px!important;
    }

    #chat-app {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
        padding: 20px;
        background: transparent;
        max-width: 800px;
        margin: 20px auto;
    }

    #messages {
        list-style: none;
        padding: 0;
        max-height: 300px; /* Adjust based on your preference */
        overflow-y: auto; /* Allows scrolling */
        margin-bottom: 20px;
    }

    #messages li {
        padding: 8px 12px;
        border-radius: 4px;
        background-color: rgba(255,255,255,0.1); /* Slightly visible message bubbles */
        margin-bottom: 10px;
    }

    #message-input {
        width: calc(100% - 92px); /* Input field width */
        padding: 10px;
        border-radius: 4px;
        border: none;
        margin-right: 10px;
    }

    #send-message {
        padding: 10px 20px;
        background-color: #ba0000; /* Red button */
        border: none;
        border-radius: 4px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #send-message:hover {
        background-color: #0056b3; /* Blue on hover */
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

</style>

<body>
    <x-nav></x-nav>
    <x-background></x-background>
    <div id="chat-app">
        <h1>Chat Room</h1>
        <ul id="messages">
            <!-- Messages will be appended here -->
        </ul>
        <input type="text" id="message-input" placeholder="Type your message...">
        <button id="send-message">Send</button>
    </div>

    <script>
        Pusher.logToConsole = true;
        // Initialize Pusher
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            encrypted: true
        });

        // Subscribe to the chat channel
        const channel = pusher.subscribe('chat');

        // Fetch messages from the server
        $.get("{{ url('/messages') }}", function(data) {
            data.forEach(message => {
                const messageHtml = `<li>${message.message}</li>`;
                $('#messages').append(messageHtml);
            });
        });

        // Bind a function to the MessageSent event
        channel.bind('message.sent', function(data) {
            const messageHtml = `<li>${data.message}</li>`;
            $('#messages').append(messageHtml);
            // alert(data.message);
        });

        // Handle sending messages
        $('#send-message').on('click', function() {
            const message = $('#message-input').val();

            if (message.trim() !== '') {
                $.ajax({
                    url: "{{ url('/send-message') }}",
                    method: 'POST',
                    data: {
                        message: message,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        $('#message-input').val(''); // Clear the input
                    },
                    error: function(error) {
                        console.error('Error sending message:', error);
                    }
                });
            }
        });
        
    </script>
</body>
</html>
