<?php

class Task {
  public $task_id;
  public $task_text;
  public $user_id;
  public $complete;
  public $date_created;
  public $date_completed;
  public $conn;
  public $tasks = [];
  public $task = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getTask() {

  }

  public function getTasks() {

  }

  public function createTask($task_text) {
    $this->task_text = $task_text;
    $sql = "INSERT INTO tasks (task_text, task_user_id) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $this->task_text, $_SESSION['user_id']);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      header("Location: index.php?success");
    }
  }

  public function completeTask() {

  }

  public function deleteTask() {

  }

}

 ?>
