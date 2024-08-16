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
        background-color: #0f0f0f; 
        color: #ba0000; 
    }

    h1 {
        text-align: center;
        font-size: 40px !important;
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
        max-height: 300px;
        overflow-y: auto;
        margin-bottom: 20px;
    }

    #messages li {
        padding: 8px 12px;
        border-radius: 4px;
        background-color: rgba(255,255,255,0.1);
        margin-bottom: 10px;
        position: relative;
    }

    .delete-message {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px;
        color: #fff;
        background-color: #ba0000;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    #message-input {
        width: calc(100% - 92px);
        padding: 10px;
        border-radius: 4px;
        border: none;
        margin-right: 10px;
    }

    #send-message {
        padding: 10px 20px;
        background-color: #ba0000;
        border: none;
        border-radius: 4px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #send-message:hover {
        background-color: #0056b3;
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
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            encrypted: true
        });

        const channel = pusher.subscribe('chat');

        $.get("{{ url('/messages') }}", function(data) {
            data.forEach(function(message) {
                const messageHtml = `<li id="message-${message.id}"><strong>${message.user.name}:</strong> ${message.message} <button class='delete-message' data-id='${message.id}'>Delete</button></li>`;
                $('#messages').append(messageHtml);
            });
        });

        channel.bind('message.sent', function(data) {
            const messageHtml = `<li id="message-${data.message.id}"><strong>${data.message.user.name}:</strong> ${data.message.message} <button class='delete-message' data-id='${data.message.id}'>Delete</button></li>`;
            $('#messages').append(messageHtml);
        });

        channel.bind('message.deleted', function(data) {
            $(`#message-${data.message.id}`).text('<this message has been deleted>');
        });

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
                    success: function(response) {
                        $('#message-input').val('');
                    },
                    error: function(xhr) {
                        console.error('Error sending message:', xhr);
                    }
                });
            }
        });

        $(document).on('click', '.delete-message', function() {
            const messageId = $(this).data('id');
            $.ajax({
                url: "{{ url('/delete-message') }}/" + messageId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $(`#message-${messageId}`).text('<this message has been deleted>');
                },
                error: function(xhr) {
                    console.error('Error deleting message:', xhr);
                }
            });
        });
    </script>
</body>
</html>
