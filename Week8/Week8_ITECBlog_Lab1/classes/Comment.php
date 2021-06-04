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

  // constructor function
  public function __construct($post_id, $conn) {
    $this->post_id = $post_id;
    $this->conn = $conn;
  }

  // Comment methods : CRUD etc
  public function getComments() {
    $sql = "SELECT * FROM comments WHERE comment_post = ?";
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
                    {$comment['comment_user']} | {$comment['date_created']}
                  </div>
                  <div class='card-body'>
                    <p class='card-text'>{$comment['comment_text']}</p>
                  </div>
                </div></div>";
    }
    echo $output;
  }


}


 ?>
