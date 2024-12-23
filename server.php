<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage; // Lista de clientes conectados
        echo "Servidor WebSocket iniciado...\n";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nueva conexión: ({$conn->resourceId})\n";

        // Notificamos a todos que un nuevo cliente se ha conectado
        $this->broadcast([
            'type' => 'status',
            'message' => "El cliente {$conn->resourceId} se ha conectado"
        ]);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Mensaje recibido de ({$from->resourceId}): $msg\n";

        // Creamos un mensaje JSON para retransmitir
        $data = [
            'type' => 'message',
            'clientId' => $from->resourceId,
            'message' => $msg,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Retransmitimos el mensaje a todos los clientes
        $this->broadcast($data, $from);
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Conexión cerrada: ({$conn->resourceId})\n";

        // Notificamos a todos que un cliente se ha desconectado
        $this->broadcast([
            'type' => 'status',
            'message' => "El cliente {$conn->resourceId} se ha desconectado"
        ]);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }

    // Método para enviar mensajes a todos los clientes
    private function broadcast(array $data, ConnectionInterface $from = null) {
        $jsonMessage = json_encode($data);
        foreach ($this->clients as $client) {
            if ($from !== null && $from === $client) {
                continue; // No enviar al remitente
            }
            $client->send($jsonMessage);
        }
    }
}

// Iniciar el servidor WebSocket
$server = \Ratchet\Server\IoServer::factory(
    new \Ratchet\Http\HttpServer(
        new \Ratchet\WebSocket\WsServer(
            new ChatServer()
        )
    ),
    8080
);

echo "Servidor WebSocket escuchando en el puerto 8080...\n";
$server->run();
