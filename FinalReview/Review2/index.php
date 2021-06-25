<?php
include 'includes/header.php';
include 'classes/Task.php';
if (isset($_POST['new-task'])) {
  $task_text = $_POST['task'];
  $task = new Task($conn);
  $task->createTask($task_text);
}

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
         <div class="card" >
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
       <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 mb-5">
          <div class="card" >
              <div class="card-header">
                  Add a new task
              </div>
              <div class="card-body">
                <form class="" action="index.php" method="post">
                  <input type="text" name="task" class="form-control mt-4 mb-4" placeholder="Input new task here....">
                  <button type="submit" name="new-task" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Add New Task</button>
                </form>

              </div>
          </div>
        </div>
       </div>
     <?php endif; ?>

 </div>

 <?php
 include 'includes/footer.php';
  ?>
