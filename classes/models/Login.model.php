<?php
class Login extends Dbh {
  protected function fetchRegistered($phone) {
    $sql = "SELECT * FROM users WHERE phone = ?";
    $stmt = $this->connectDB()->prepare(($sql));
    $stmt->execute([$phone]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function insertUserData($phone, $country, $code) {
    $membership_date  = gmdate('Y-m-d H:i:s');
    $sql = "INSERT INTO users(phone , country , code , membership_date) VALUES (?, ? , ? , ?)";
    $stmt = $this->connectDB()->prepare($sql);
    return $stmt->execute([$phone, $country, $code, $membership_date]);
  }

  protected function updateCookieValue($cookie, $phone) {
    $sql = "UPDATE users SET cookie = ? WHERE phone = ?";
    $stmt = $this->connectDB()->prepare($sql);
    return $stmt->execute([$cookie, $phone]);
  }
}
