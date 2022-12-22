<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\MyWebSocketServer;

$ip = "127.0.0.1";
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR .  'vendor'  . DIRECTORY_SEPARATOR .  'autoload.php';
require_once './ratchet.php';

$server = IoServer::factory(
  new HttpServer(
    new WsServer(
      new MyWebSocketServer()
    )
  ),
  8080,
  $ip
);

$server->run();
