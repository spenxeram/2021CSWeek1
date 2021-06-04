<?php

class Comment {
  //class properties
  public $comment_text;
  public $comment_author;
  public $comment_user_id;
  public $post_id;
  public $comment_id;
  public $comment;
  public $comments = [];
  public $conn;
  public $insert_id;

  // constructor function
  public function __construct($post_id, $conn) {
    $this->post_id = $post_id;
    $this->conn = $conn;
  }

  // Comment methods : CRUD etc
  public function getComments() {
    $sql = "SELECT u.user_name, c.comment_text, c.date_created FROM comments c JOIN users u ON u.ID = c.comment_user WHERE comment_post = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $this->comments = $result->fetch_all(MYSQLI_ASSOC);
  }

  public function outputComments() {
    $output = "";
    foreach ($this->comments as $comment) {
      $output.= "<div class='col-md-8 mt-2 mb-2'><div class='card'>
                  <div class='card-header'>
                    {$comment['user_name']} | {$comment['date_created']}
                  </div>
                  <div class='card-body'>
                    <p class='card-text'>{$comment['comment_text']}</p>
                  </div>
                </div></div>";
    }
    echo $output;
  }

  public function createComment($comment_text, $user_id) {
    $sql = "INSERT INTO comments (comment_text, comment_user, comment_post) VALUES (?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sii", $comment_text, $user_id, $this->post_id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->insert_id = $stmt->insert_id;
      $this->getComment();
    }
  }

  public function getComment() {
    $sql = "SELECT u.user_name, c.comment_text, c.date_created FROM comments c JOIN users u ON u.ID = c.comment_user WHERE c.ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->insert_id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
  }


}


 ?>
