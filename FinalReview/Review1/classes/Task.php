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
    $this->user_id = $user_id;
    $sql = "SELECT * FROM tasks WHERE user_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->user_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows >= 1) {
      $this->tasks = $results->fetch_all(MYSQLI_ASSOC);
    }
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
