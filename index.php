<?php
require_once 'includes/functions.inc.php';
if (isset($_SESSION['code'])) {
  header("Location: ./verifications");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome </title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <main>
    <h3>Welcome back to chatapp</h3>
    <p>Please enter your phone number to get started</p>
    <form action="POST">
      <div class="country">
        <label for="country">Select country:</label>
        <select name="country" id="count">
        </select>
      </div>
      <div id="inputSection">
        <div class="flag"><img src="" alt="Country Logo"></div>
        <div class="code">+233</div>
        <input type="text" name="phone" id="phone">
      </div>
      <p class="err">Error Message</p>
      <button>Get Started</button>
    </form>
  </main>

  <script src="./js/index.js" defer type="module"></script>
</body>

</html>