<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require __DIR__ . '/vendor/autoload.php';

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage; // Almacenamos todas las conexiones
        echo "Servidor WebSocket iniciado...\n";
    }

    // Se ejecuta cuando un cliente se conecta
    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn); // Añadimos el cliente a la lista
        echo "Nueva conexión ({$conn->resourceId})\n";

        // Notificamos a todos los clientes que hay una nueva conexión
        $this->broadcast([
            'type' => 'status',
            'message' => "El cliente {$conn->resourceId} se ha conectado"
        ]);
    }

    // Se ejecuta cuando un cliente envía un mensaje
    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Mensaje recibido de {$from->resourceId}: $msg\n";

        // Creamos un mensaje estructurado en JSON
        $data = [
            'type' => 'message',
            'clientId' => $from->resourceId,
            'message' => $msg,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Enviamos el mensaje a todos los clientes conectados
        $this->broadcast($data, $from);
    }

    // Se ejecuta cuando un cliente cierra la conexión
    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn); // Eliminamos al cliente de la lista
        echo "Conexión ({$conn->resourceId}) cerrada\n";

        // Notificamos a todos los clientes que un cliente se ha desconectado
        $this->broadcast([
            'type' => 'status',
            'message' => "El cliente {$conn->resourceId} se ha desconectado"
        ]);
    }

    // Se ejecuta cuando ocurre un error
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error en la conexión ({$conn->resourceId}): {$e->getMessage()}\n";
        $conn->close();
    }

    // Método auxiliar para enviar mensajes a todos los clientes
    private function broadcast(array $data, ConnectionInterface $from = null) {
        $jsonMessage = json_encode($data);
        foreach ($this->clients as $client) {
            // Si $from no es nulo, no reenviar el mensaje al remitente
            if ($from !== null && $from === $client) {
                continue;
            }
            $client->send($jsonMessage);
        }
    }
}

// Inicializamos el servidor
$server = \Ratchet\Server\IoServer::factory(
    new \Ratchet\Http\HttpServer(
        new \Ratchet\WebSocket\WsServer(
            new Chat()
        )
    ),
    8080 // Puerto donde el servidor escucha
);

echo "Servidor WebSocket escuchando en el puerto 8080...\n";
$server->run();
