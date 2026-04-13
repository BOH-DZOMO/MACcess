<html>

<head>
    <title>SSE</title>
</head>

<body>
    <h1>SSE</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
    <div id="output"></div>
    <img id="qr-code" src="" alt="Scan me!">

    <script>
        let img = document.getElementById('qr-code');
        const eventSource = new EventSource("/sse");
        eventSource.onmessage = function(event) {
            img.src = `data:image/svg+xml;base64,${event.data}`;
        }
    </script>
    {{-- <h1>Real-time Server Time</h1>
    <div id="time-display">Waiting for data...</div>
    <div id="message-display"></div>

    <script>
        // This starts the SECOND request to the server
        const eventSource = new EventSource("/sse");

        // Listening for the "event: ping" you defined in PHP
        eventSource.addEventListener('ping', function(event) {
            const data = JSON.parse(event.data);
            document.getElementById('time-display').innerText = data.time;
        });

        // Listening for messages that don't have a specific "event" name
        eventSource.onmessage = function(event) {
            const newElement = document.createElement("p");
            newElement.innerText = event.data;
            document.getElementById('message-display').appendChild(newElement);
        };

        // Error handling if the server closes the connection
        eventSource.onerror = function() {
            console.log("Connection lost. Browsers usually retry automatically.");
        };
    </script> --}}
</body>

</html>
