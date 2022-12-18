<?php
require_once 'includes/functions.inc.php';
// Redirect if session is not set 
if (!isset($_SESSION['code'])) {
  header('Location: ./');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/verifications.css">
</head>

<body>
  <main>
    <h3>Verify your account</h3>
    <p>A text message was sent to your phone. Enter code below </p>
    <form action="">
      <label for="code">Enter code:</label>
      <input type="text" id="code" name="code" placeholder="000000">
      <p class="err">Error Message</p>
      <button>Submit code </button>
    </form>

    <div class="resendCode">
      <p class="resend">Resend code ?</p>
      <p class="timer">0.00</p>
    </div>
  </main>
  <script src="./js/verifications.js" type="module"></script>
</body>

</html>