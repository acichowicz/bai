<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">Logging Aplication</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
<!--       <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
    <?php
    if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] == 1) { ?>
      <a href="logout_action.php">
        <button class="btn btn-outline-success my-2 my-sm-0">Wyloguj się!</button>
      </a>
    <?php } else { ?>
      <a href="register.php">
        <button class="btn btn-outline-success my-2 my-sm-0 mx-3">Rejestruj</button>
      </a>
      <a href="login.php">
        <button class="btn btn-outline-success my-2 my-sm-0">Zaloguj się</button>
      </a>
    <?php } ?>
  </div>
</nav>