<?php
include 'includes/header.php';
include 'classes/Task.php';

if(isset($_POST['create-task'])) {
  $thetask = $_POST['task'];
  $task = new Task($conn);
  $task->createTask($thetask);
}

if($_SESSION['loggedin']) {
  $tasks = new Task($conn);
  $tasks->getTasks($_SESSION['user_id']);
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
       <div class="row">
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
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">

          <?php

          if (empty($tasks->tasks)): ?>
            <h1 class="display-2">No tasks....</h1>
          <?php else: ?>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th></th>
                  <th>Task</th>
                  <th>Completed</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tasks->tasks as $task): ?>
                    <tr>
                      <td><input type="checkbox" class="complete" name="task" value="<?php echo $task['ID']; ?>"></td>
                    <td><?php echo htmlspecialchars($task['task']); ?></td>
                    <td><a href="index.php?delete=<?php echo $task['ID']; ?>" class="delete"><button type="button" class="btn btn-danger">delete</button></a></td>

                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>

          <?php endif; ?>
        </div>
      </div>
     <?php endif; ?>

 </div>

 <?php
 include 'includes/footer.php';
  ?>
