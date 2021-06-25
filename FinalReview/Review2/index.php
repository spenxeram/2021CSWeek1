<?php
include 'includes/header.php';


 ?>

 <div class="container">
   <?php if (isset($_GET['success'])): ?>
     <div class="alert alert-success mt-3" role="alert">
       Task added successfully!
     </div>
   <?php elseif(isset($_GET['login'])): ?>
     <div class="alert alert-success mt-3" role="alert">
       You have logged in!
     </div>
   <?php elseif(isset($_GET['error'])): ?>
     <div class="alert alert-danger mt-3" role="alert">
       There was a problem adding your task...
     </div>
   <?php endif; ?>

     <?php if (!$_SESSION['loggedin']): ?>
      <div class="row">
       <div class="col-md-6 offset-md-3 mt-5 mb-5">
         <div class="card" style="width: 18rem;">
             <div class="card-header">
                 Please Login!
             </div>
             <div class="card-body">
                 <h5 class="card-title">You must login to add a task!</h5>
                 <a href="login.php" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Login/Create Account</a>
             </div>
         </div>
       </div>
      </div>
     <?php else: ?>
       aDD TASKS
     <?php endif; ?>

 </div>

 <?php
 include 'includes/footer.php';
  ?>
