<?php

namespace MyApp;

require_once 'classes/Dbh.class.php';
require_once 'classes/models/User.model.php';
require_once 'classes/controllers/User.controller.php';
require_once 'classes/models/Chat.model.php';
require_once 'classes/controllers/Chat.controller.php';


use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use UserController;

$user = new UserController();

class MyWebSocketServer implements MessageComponentInterface {
  protected $clients;

  public function __construct() {
    $this->clients = new \SplObjectStorage;
  }

  public function onOpen(ConnectionInterface $conn) {
    // Store the new connection to send messages to later
    $this->clients->attach($conn);

    echo "New connection! ({$conn->resourceId})\n";
  }

  public function onMessage(ConnectionInterface $from, $msg) {
    $data = json_decode($msg);
    global $user;
    $user->setUserId($data->user);

    if ($data->type === 'connected') {
      // Set status
      $res = $user->changeStatus('online');
      if ($res) {
        $data->status = 'online';
      } else {
        $data->status = 'offline';
      }
    }
    if ($data->type === 'fetchChats') {
    }

    foreach ($this->clients as $client) {
      if ($from !== $client) {
        // The sender is not the receiver, send to each client connected
        $client->send(json_encode($data));
      }
      $client->send(json_encode($data));
    }
  }

  public function onClose(ConnectionInterface $conn) {
    // The connection is closed, remove it, as we can no longer send it messages
    $this->clients->detach($conn);
    echo "Connection {$conn->resourceId} has disconnected\n";
    // Set user's status to offline 
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
    echo "An error has occurred: {$e->getMessage()}\n";
    $conn->close();
  }
}
