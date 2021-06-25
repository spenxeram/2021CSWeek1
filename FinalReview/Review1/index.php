<?php
include 'includes/header.php';
 ?>

 <div class="container">
   <div class="row">
     <?php if (!$_SESSION['loggedin']): ?>
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
     <?php else: ?>
       to do list here
     <?php endif; ?>
   </div>
 </div>

 <?php
 include 'includes/footer.php';
  ?>
