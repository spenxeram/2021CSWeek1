<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <nav>
       <h3>Session Demo</h3>
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="about.php">About</a></li>
         <li><a href="contact.php">Contact</a></li>
       </ul>

       <ul>
        <?php if ($_SESSION['loggedin'] === true): ?>
          <li><a href="index.php"><?php echo $_SESSION['username']; ?></a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
       </ul>
     </nav>
     <hr>
     <?php var_dump($_SESSION); ?>
     <h2>Contact Title</h2>
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   </body>
 </html>
