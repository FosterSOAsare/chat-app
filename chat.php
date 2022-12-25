<?php
require_once "includes/functions.inc.php";
require_once "classes/Dbh.class.php";
require_once "classes/models/User.model.php";
require_once 'classes/controllers/User.controller.php';
statusRedirect();
$user = new UserController($_COOKIE['loggedUser']);
$user->getUser();
$loggedInfo = $user->loggedUser;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat page</title>
  <link rel="stylesheet" href="./css/chat.css">
  <script src="https://kit.fontawesome.com/f6e3b67683.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="header__left">
      <p>Edit</p>
    </div>
    <div class="header__right">
      <div class="icon camera"><i class="fa-solid fa-camera"></i></div>
      <div class="icon newChat"><i class="fa-regular fa-pen-to-square"></i></div>
    </div>
  </header>
  <main>
    <section id="topSection">
      <h1 class="page">Chats</h1>
      <article id="searchSection">
        <form action="" method="POST">
          <label for="search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </label>
          <input type="text" name="search" id="search" placeholder="Search">
        </form>
        <div class="sort">
          <i class="fa-solid fa-sort"></i>
        </div>
      </article>
      <article class="lists">
        <div class="broadCastLists">
          <p>Broadcast Lists</p>
        </div>
        <div class="newGroup">
          <p>New Group</p>
        </div>
      </article>
    </section>

    <section id="chats">
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
      <article class="chat">
        <div class="profile"></div>
        <div class="details">
          <div class="details__desc">
            <div class="name">You</div>
            <div class="lastMessage">
              <div class="status"><i class="fa-solid fa-check"></i><i class="fa-solid fa-check-double"></i></div>
              <div class="desc"></div>
              <p class="text"> Hello Dead</p>
            </div>
          </div>
          <div class="desc__notices">
            <div class="time">
              <p>2:16 PM</p>
            </div>
            <div class="actions"></div>
          </div>
        </div>
      </article>
    </section>
  </main>
  <script>
    function getUser() {
      return <?php echo json_encode($loggedInfo) ?>;
    }
  </script>
  <script src="./js/chat.js" type="module"></script>

</body>

</html>