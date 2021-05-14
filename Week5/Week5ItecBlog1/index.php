<?php include 'includes/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-white">
      <div class="container">
        <h1 class="display-3">Welcome to ITEC Blog 2021</h1>
        <p class="lead">Login to create a post!</p>
        <button type="button" class="btn btn-outline-primary btn-lg"><a href="login.pho">Login here!</a></button>
      </div>
    </div>

    <div class="container">
      <?php if (isset($_GET['logout'])): ?>
        <div class="alert alert-success" role="alert">
          You have logged out successfully.
        </div>
      <?php elseif(isset($_GET['login'])): ?>
        <div class="alert alert-success" role="alert">
          You have logged in successfully.
        </div>
      <?php endif; ?>
      <h2>Recent Articles</h2>
      <div class="row">
        <div class="col-md-4">
          <h3>Item 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-4">
          <h3>Item 2</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-4">
          <h3>Item 3</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="row">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>
