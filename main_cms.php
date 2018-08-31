<?php

session_start();

if (!isset($_COOKIE[$_SESSION['cookieName']])) {
	header("Location: login.php");
	exit();
}

$user_array = $_SESSION['user_data'];
?>
<!doctype html>
<html lang="en">

<?php include('template/head.html.php'); ?>

  <body>

  <main role="main" class="container">

  <div class="starter-template">
    <div class="center">
      <h3>
      	Witaj! <span style="color: blue; font-weight: bolder;">
        <?php
          echo $user_array[1];
        ?>
        </span><br>Twój email to: 
        <?php
          echo $user_array[4];
        ?> <br>
        <?php // echo session_id(); ?> <br>
        <?php // echo $_COOKIE['PHPSESSID']; ?> <br>
      </h3>
    </div>
    <div class="">
      <a href="logout_action.php"><h3>Wyloguj się!</h3></a>
    </div>
  </div>

  </main><!-- /.container -->

  <?php require_once('template/footer_scripts.html.php'); ?>

  </body>
</html>