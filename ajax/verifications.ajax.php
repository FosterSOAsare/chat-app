<?php
require_once "../includes/functions.inc.php";
require_once '../sms.service.php';
require_once '../classes/Dbh.class.php';
require_once '../classes/models/Login.model.php';
require_once '../classes/controllers/Login.controller.php';
require_once '../classes/views/Login.view.php';

if (isset($_POST['type']) && $_POST['type'] == 'login') {
  $phone = htmlspecialchars($_POST['phone']);
  $countryCode = htmlspecialchars($_POST['code']);
  $country = htmlspecialchars(($_POST['country']));

  try {

    $login = new LoginController($phone, $country, $countryCode);
    // Generate random code 
    $code = $login->generateCode();

    // Send SMS
    $sms = $login->sendSMS($code);
    if ($sms !== 'success') {
      echo $sms;
      return;
    }
    echo 'success';
    // Save code for verifications
    $_SESSION['code'] = $code;
    $_SESSION['phone'] = $phone;
    $_SESSION['country'] = $country;
    $_SESSION['countryCode'] = $countryCode;
  } catch (Error $e) {
    echo "An error occurred";
  }
}

if (isset($_POST['type']) && $_POST['type'] == 'verify') {
  $code = htmlspecialchars($_POST['code']);
  $phone = $_SESSION['phone'];
  $country = $_SESSION['country'];
  $countryCode = $_SESSION['countryCode'];

  // Verify code 
  if ($code != $_SESSION['code']) {
    echo 'Please enter the valid code ';
    return;
  }

  // Check if user is registered or not 
  $user = new LoginController($phone, $country, $countryCode);
  $res = $user->checkRegistered();
  if (!$res) {
    // Save user data 
    if (!$user->saveUserInfo()) {
      echo "An error occurred";
      return;
    };
  }

  // Update cookie
  $cookie = $user->generateCookie();

  $user->saveNewCookieValue($cookie);

  setcookie('loggedUser', $cookie, time() + 2592000, '/');
  session_destroy();
  echo 'success';
}
