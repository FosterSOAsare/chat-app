<?php
require_once 'classes/Dbh.class.php';
require_once 'classes/models/User.model.php';
require_once 'classes/controllers/User.controller.php';
require_once 'classes/views/User.view.php';

$user = new UserController();
var_dump($user->fetchUsers());
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>