<?php

if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
  if (isset($_SESSION['cookieName']) && isset($_COOKIE[$_SESSION['cookieName']])) {
    header("Location: main_cms.php");
    exit();
  }
}
?>
<!doctype html>
<html lang="en">

<?php require_once('template/head.html.php'); ?>

  <body>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Logowanie</h1>
        <form method="POST" action="login_action.php">
          <?php
            if (isset($_SESSION['e_unactive_account'])) {
              echo '<div class="error">' . $_SESSION['e_unactive_account'] . '</div>';
              unset($_SESSION['e_unactive_account']);
            }
            if (isset($_GET['active'])) {
              if ($_REQUEST && $_GET['active'] == 'true') {
                echo "<p class='info-sub'>Konto aktywowane! Możesz się zalogować</p>";
              } else {
                echo "<p class='info-sub'>Konto nieaktywne! Coś poszło nie tak</p>";
              }
            }
          ?>
          <div class="mb-3">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" value="<?php echo isset($_SESSION['regLogin']) ? $_SESSION['regLogin'] : '' ?>">
            <?php
            if (isset($_SESSION['e_incorret_login'])) {
              echo '<div class="error">' . $_SESSION['e_incorret_login'] . '</div>';
              unset($_SESSION['e_incorret_login']);
            }
            ?>
          </div>
          <div class="mb-3">
            <label for="pass">Hasło</label>
            <input type="password" name="pass" class="form-control">
            <?php
            if (isset($_SESSION['e_incorret_pass'])) {
              echo '<div class="error">' . $_SESSION['e_incorret_pass'] . '</div>';
              unset($_SESSION['e_incorret_pass']);
            }
            ?>
          </div>

          <div style="text-align: center;">
            <button class="btn btn-primary btn-lg btn-block" style="display: inline; width: 150px;" type="submit" name="login_submit">Zaloguj się</button>
                      <a href="index.php">
            <button class="btn btn-primary btn-lg btn-block" style="display: inline; width: 150px;" type="button">Powrót</button>
          </a>
          </div>
        </form>
      </div>

    </main><!-- /.container -->

  <?php require_once('template/footer_scripts.html.php'); ?>

  </body>
</html>