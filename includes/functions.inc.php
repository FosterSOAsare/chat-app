<?php
session_start();

function statusRedirect() {
  if (!isset($_COOKIE['loggedUser'])) {
    header('Location: ./');
  }
}
