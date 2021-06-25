<?php

class Task {
  public $task;
  public $user_id;
  public $user_name;
  public $completed;
  public $conn;
  public $tasks = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getTasks($user_id) {

  }

  public function createTask($task) {
    $this->task = $task;
    $sql = "INSERT INTO tasks (task, user_id) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $this->task, $_SESSION['user_id']);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      header("Location: index.php?success");
    } else {
      header("Location: index.php?error");
    }
  }

  public function deleteTask($id) {

  }

  public function completedTask($id) {

  }


}

 ?>
