<?php

class Comment {
  public $page_id;
  public $conn;
  public $insert_id;
  public $comment_text;
  public $errors = [];
  public $comments = [];

  public function __construct($page_id, $conn) {
    $this->conn = $conn;
    $this->page_id = $page_id;
  }

  public function createComment($comment) {
    $this->comment_text = $comment;
    $sql = "INSERT INTO comments (comment_text, comment_user, comment_post) VALUE (?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sii", $this->comment_text, $_SESSION['user_id'], $this->page_id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->insert_id = $stmt->insert_id;
      $this->getComment();
    } else {
      echo json_encode($errors);
    }
  }

  public function getComment() {
    $sql = "SELECT cm.ID, cm.comment_text, u.user_name, cm.date_created FROM comments cm JOIN users u ON u.ID = cm.comment_user WHERE cm.ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->insert_id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
}


function getComments() {
  $sql = "SELECT cm.ID, cm.comment_text, u.user_name, cm.date_created FROM comments cm JOIN users u ON u.ID = cm.comment_user JOIN posts ON posts.ID = cm.comment_post WHERE posts.ID = ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param("i", $this->page_id);
  $stmt->execute();
  $results = $stmt->get_result();
  $this->comments = $results->fetch_all(MYSQLI_ASSOC);
}

function outputComments() {
  $output = '';
  foreach ($this->comments as $comment) {
    $output .= "<div class='card mt-2 mb-2'><div class='card-header'> {$comment['user_name']} | {$comment['date_created']} <a href='func/commentmanager.pgp?id={$comment['ID']}'><button type='button' class='btn delete-post btn-outline-danger btn-sm  float-right'>X</button></a></div><div class='card-body'><p class='card-text'>{$comment['comment_text']} </p></div></div>";
  }
  echo $output;
}

}

function deleteComment($id) {
  $sql = "DELETE FROM comments WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  echo $stmt->affected_rows;
}
 ?>
