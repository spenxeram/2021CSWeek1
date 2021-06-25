<?php
include 'includes/header.php';
include 'classes/Task.php';

if(isset($_POST['create-task'])) {
  $thetask = $_POST['task'];
  $task = new Task($conn);
  $task->createTask($thetask);
}


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
       <div class="col-md-6 offset-md-3 mt-5 mb-5">
         <div class="card">
             <div class="card-header">
                 <h2>Add a Task</h2>
             </div>
             <div class="card-body">
               <form class="" action="index.php" method="post">
                 <input type="text" name="task" class=" mt-2 mb-2 form-control" placeholder="Enter your task here...">
                 <button type="submit" name="create-task" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Add Task</button>
               </form>
             </div>
         </div>
       </div>
     <?php endif; ?>
   </div>
 </div>

 <?php
 include 'includes/footer.php';
  ?>
