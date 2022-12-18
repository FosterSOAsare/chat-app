<?php
// require_once "../../sms.service.php";

class LoginController extends Login {
  private $phone;
  private $country;
  private $code;

  public function __construct($phone, $country, $code) {
    $this->phone = $phone;
    $this->code = $code;
    $this->country = $country;
  }

  public function generateCode() {
    return rand(100000, 999999);
  }

  public function sendSMS($code) {
    $message = "Your chat app code is " . $code . ". Please do not share";
    return sendSMS($message, '+' . $this->code . $this->phone);
  }

  public function saveNewCookieValue($cookie) {
    return $this->updateCookieValue($cookie, $this->phone);
  }

  public function checkRegistered() {
    $registered =  $this->fetchRegistered($this->phone);
    return $registered;
  }

  public function saveUserInfo() {
    return $this->insertUserData($this->phone, $this->country, $this->code);
  }

  public function generateCookie() {
    return uniqid();
  }
}
