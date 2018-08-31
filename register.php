<?php
  require __DIR__ . '/vendor/autoload.php';

  session_start();
?>
<!doctype html>
<html lang="en">

<?php require_once('template/head.html.php'); ?>

  <body>

    <main role="main" class="container">

      <div class="starter-template">
        <?php
          if (isset($_GET['register'])) {
              if ($_REQUEST && $_GET['register'] == 'true') {
                echo "<p class='info-sub'>Na podany adres email został wysłany link aktywacyjny!</p>";
              }
            }
        ?>
        <h1>Rejestracja</h1>
        <form method="POST" action="register_action.php">
          <div class="mb-3">
            <label for="name">Imię</label>
            <input type="text" name="name" class="form-control" value="<?php echo isset($_SESSION['regName']) ? $_SESSION['regName'] : '' ?>">
            <?php
              if (isset($_SESSION['e_imie'])) {
                echo '<div class="error">' . $_SESSION['e_imie'] . '</div>';
                unset($_SESSION['e_imie']);
              }
              if (isset($_SESSION['e_hasSpaces_imie'])) {
                echo '<div class="error">' . $_SESSION['e_hasSpaces_imie'] . '</div>';
                unset($_SESSION['e_hasSpaces_imie']);
              }
            ?>
          </div>
          <div class="mb-3">
            <label for="surname">Nazwisko</label>
            <input type="text" name="surname" class="form-control" value="<?php echo isset($_SESSION['regSurname']) ? $_SESSION['regSurname'] : '' ?>">
            <?php
              if (isset($_SESSION['e_nazwisko'])) {
                echo '<div class="error">' . $_SESSION['e_nazwisko'] . '</div>';
                unset($_SESSION['e_nazwisko']);
              }
              if (isset($_SESSION['e_hasSpaces_nazwisko'])) {
                echo '<div class="error">' . $_SESSION['e_hasSpaces_nazwisko'] . '</div>';
                unset($_SESSION['e_hasSpaces_nazwisko']);
              }
            ?>
          </div>
          <div class="mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" value="<?php echo isset($_SESSION['regEmail']) ? $_SESSION['regEmail'] : '' ?>">
            <?php
              if (isset($_SESSION['e_email'])) {
                echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                unset($_SESSION['e_email']);
              }
            ?>
          </div>
          <div class="mb-3">
            <label for="pass">Hasło</label>
            <input type="password" name="pass" class="form-control">
          </div>
          <div class="mb-3">
            <label for="pass2">Powtórz hasło</label>
            <input type="password" name="pass2" class="form-control">
            <?php
              if (isset($_SESSION['e_invalid_pass'])) {
                echo '<div class="error">' . $_SESSION['e_invalid_pass'] . '</div>';
                unset($_SESSION['e_invalid_pass']);
              }
              if (isset($_SESSION['e_diffrent_pass'])) {
                echo '<div class="error">' . $_SESSION['e_diffrent_pass'] . '</div>';
                unset($_SESSION['e_diffrent_pass']);
              }
              if (isset($_SESSION['e_user_exist'])) {
                echo '<div class="error">' . $_SESSION['e_user_exist'] . '</div>';
                unset($_SESSION['e_user_exist']);
              }
              if (isset($_GET['spaces'])) {
                if ($_REQUEST && $_GET['spaces'] == 'true') {
                  echo "<p class='info-sub'>Imię lub nazwisko nie może zawierać spacji!</p>";
                }
              }
            ?>
          </div>

          <div style="text-align: center;">
            <button class="btn btn-primary btn-lg btn-block" style="display: inline; width: 150px;" type="submit" name="register_submit">Rejestruj</button>
            <button class="btn btn-primary btn-lg btn-block" style="display: inline; width: 150px; margin-top: 0;" type="reset">Reset</button>
          </div>
        </form>
        <div style="text-align: center;">
          <a href="index.php">
            <button class="btn btn-primary btn-lg btn-block" style="display: inline; width: 150px; margin-top: 20px;">Powrót</button>
          </a>
        </div>
      </div>

    </main><!-- /.container -->

  <?php require_once('template/footer_scripts.html.php'); ?>

  </body>
</html>