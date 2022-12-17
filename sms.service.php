<?php

require_once 'vendor/autoload.php';

// Setting up dot env
// composer require vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Dotenv\Dotenv;
use Twilio\Rest\Client;

// Retrive env variable
$sid = $_ENV['sid'];
$token = $_ENV['token'];

function sendSMS($body, $number) {
  global $sid, $token;
  $twilio = new Client($sid, $token);
  try {
    $message = $twilio->messages
      ->create(
        $number, // to
        [
          "body" => $body,
          "from" => "+12067598669"
        ]
      );

    if ($message->sid) {
      return "success";
    } else {
      return "Message was not sent";
    }
  } catch (Error $e) {
    return 'An error occured ';
  }
}

// sendSMS("This is dead", "+233550529015");
