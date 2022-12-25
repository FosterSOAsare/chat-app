<?php
class UserController extends User {
  public $loggedUser;
  public $userId;
  public function __construct() {
    if ($_COOKIE && $_COOKIE["loggedUser"]) {
      $this->cookie = $_COOKIE['loggedUser'];
    }
  }
  public function getUser() {
    $this->loggedUser = $this->fetchUser($this->cookie);
  }

  public function setUserId($userId) {
    $this->userId = $userId;
  }

  public function changeStatus($status) {
    if ($this->loggedUser) {
      return $this->updateStatus($status, $this->loggedUser['user_id']);
    }
    return $this->updateStatus($status, $this->userId);
  }
}
