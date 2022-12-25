<?php
class User extends Dbh {
  protected function fetchUser($cookie) {
    $sql = "SELECT * FROM USERS WHERE cookie = ?";
    $stmt = $this->connectDB()->prepare($sql);
    $stmt->execute([$cookie]);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res;
  }

  protected function updateStatus($status, $user_id) {
    $sql = "UPDATE users SET status = 'online' WHERE user_id = ?";
    $stmt = $this->connectDB()->prepare($sql);
    return $stmt->execute([$user_id]);
  }
}
