<?php
require_once "../includes/functions.inc.php";
require_once '../sms.service.php';
require_once '../classes/Dbh.class.php';
require_once '../classes/models/Login.model.php';
require_once '../classes/controllers/Login.controller.php';
require_once '../classes/views/Login.view.php';

if (isset($_POST['type']) && $_POST['type'] == 'login') {
  $phone = htmlspecialchars($_POST['phone']);
  $code = htmlspecialchars($_POST['code']);
  $country = htmlspecialchars(($_POST['country']));

  try {

    $login = new LoginController($phone, $country, $code);
    // Generate random code 
    $code = $login->generateCode();


    // Send SMS
    $sms = $login->sendSMS($code);
    if ($sms !== 'success') {
      echo $sms;
      return;
    }
    echo  'success';
    // Save code for verifications
    $_SESSION['code'] = $code;
  } catch (Error $e) {
    echo "An error occurred";
  }
}
