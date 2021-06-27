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

  public function getTask($id) {
    $this->task_id = $id;
    $sql = "SELECT * FROM tasks WHERE ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->task_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->task = $results->fetch_assoc();
  }

  public function getTasks($user_id) {
    $this->user_id = $user_id;
    $sql = "SELECT * FROM tasks WHERE task_user_id = ? ORDER BY task_status ASC, date_created DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->user_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows >= 1) {
      $this->tasks = $results->fetch_all(MYSQLI_ASSOC);
    }
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

  public function completeTask($id) {
    $this->getTask($id);
    if($this->task['task_user_id'] == $_SESSION['user_id']) {
      $sql = "UPDATE tasks SET task_status = 1 WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->task_id);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        echo "success";
      }
    }
  }

  public function deleteTask($id) {
    $this->getTask($id);
    if($this->task['task_user_id'] == $_SESSION['user_id']) {
      $sql = "DELETE FROM tasks WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->task_id);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        header("Location: index.php?delete");
      }
    } else {
      header("Location: index.php?error");
    }
  }

}

 ?>
