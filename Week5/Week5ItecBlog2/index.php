<?php
include 'includes/header.php';
 ?>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-3">Itec Blog 2021</h1>
        <p class="lead">Log in and tell us about the covid experience</p>
        <button type="button" class="btn btn-dark">Btn</button>
      </div>
    </div>
    <div class="container">
      <?php if (isset($_GET['login'])): ?>
        <div class="alert alert-success" role="alert">
          You have logged in successfully!
        </div>
      <?php elseif(isset($_GET['logout'])): ?>
      <div class="alert alert-warning" role="alert">
        You have logged out successfully!
      </div>
      <?php endif; ?>
      <div class="row">
        <h2>Some content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>

<?php
include 'includes/footer.php';
 ?>
