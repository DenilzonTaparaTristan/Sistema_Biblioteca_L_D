<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat con WebSocket</title>
    <style>
        #chat-icon {
            position: fixed;
            bottom: 10px;
            right: 10px;
            cursor: pointer;
        }

        #chat-container {
            display: none;
            position: fixed;
            bottom: 70px;
            right: 10px;
            width: 300px;
            height: 400px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        #chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        #chat-input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Icono para abrir el chat -->
    <div id="chat-icon">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="Chat" style="width: 50px; height: 50px;">
    </div>

    <!-- Contenedor del chat -->
    <div id="chat-container">
        <div id="chat-messages"></div>
        <input id="chat-input" type="text" placeholder="Escribe un mensaje...">
    </div>

    <script>
        const chatIcon = document.getElementById('chat-icon');
        const chatContainer = document.getElementById('chat-container');
        const chatMessages = document.getElementById('chat-messages');
        const chatInput = document.getElementById('chat-input');

        // Conexión al servidor WebSocket
        const socket = new WebSocket('ws://localhost:8080');

        // Mostrar/Ocultar el chat
        chatIcon.addEventListener('click', () => {
            chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
        });

        // Enviar mensaje al servidor WebSocket
        chatInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                const message = chatInput.value;
                socket.send(message);
                chatMessages.innerHTML += `<div><strong>Tú:</strong> ${message}</div>`;
                chatInput.value = '';
            }
        });

        // Recibir mensajes del servidor
        socket.onmessage = (event) => {
            chatMessages.innerHTML += `<div><strong>Otro:</strong> ${event.data}</div>`;
        };

        // Manejo de errores
        socket.onerror = (error) => {
            console.error('WebSocket Error:', error);
        };

        // Desconexión
        socket.onclose = () => {
            console.log('Conexión cerrada');
        };
    </script>
</body>
</html>
