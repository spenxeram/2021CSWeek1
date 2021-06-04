<?php

class Comment {
  // comment properties
  public $comment_text;
  public $comment_id;
  public $comment_user_id;
  public $comment_user_name;
  public $comment_post_id;
  public $comment_date_created;
  public $comment = [];
  public $comments = [];
  public $conn;

  // constructor function
  public function __construct($post_id, $conn) {
    $this->comment_post_id = $post_id;
    $this->conn = $conn;
  }

  // general methods: CRUD

  public function getComments() {
    $sql = "SELECT c.ID, c.comment_text, c.date_created, u.user_name FROM comments c JOIN users u ON u.ID = c.comment_user WHERE c.comment_post = ? ORDER BY c.date_created DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->comment_post_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->comments = $results->fetch_all(MYSQLI_ASSOC);
  }

  public function outputComments() {

  }

  public function createComment() {

  }

  public function getComment() {

  }

  public function deleteComment() {

  }

  public function updateComment() {

  }


}

 ?>
