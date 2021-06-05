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
    $sql = "SELECT c.ID, c.comment_text, c.date_created, u.user_name, c.comment_user FROM comments c JOIN users u ON u.ID = c.comment_user WHERE c.comment_post = ? ORDER BY c.date_created DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->comment_post_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->comments = $results->fetch_all(MYSQLI_ASSOC);
  }

  public function outputComments() {
    $output = "";
    foreach ($this->comments as $comment) {
      if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['comment_user'] || $_SESSION['user_role'] == 1) {
        $button = "<button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='{$comment['ID']}'>X</button>";
      } else {
        $button = "";
      }
      $output.= "<div class='col-md-8 mt-2 mb-2'><div class='card'>
            <div class='card-header'>
              {$comment['user_name']} | {$comment['date_created']}
              {$button};
            </div>
            <div class='card-body'>
              <p class='card-text'>{$comment['comment_text']}</p>
            </div>
          </div></div>";
    }
    echo $output;
  }

  public function createComment($comment_text) {
    $this->comment_text = $comment_text;
    $sql = "INSERT INTO comments (comment_text, comment_user, comment_post) VALUES (?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sii", $this->comment_text, $_SESSION['user_id'], $this->comment_post_id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->comment_id = $stmt->insert_id;
      // this will return the comment as a json encoded string
      $this->getComment();
    }
  }

  public function getComment() {
    $sql = "SELECT c.ID as comment_id, c.comment_text, c.date_created, u.user_name, c.comment_user FROM comments c JOIN users u ON u.ID = c.comment_user WHERE c.ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->comment_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->comment = $results->fetch_assoc();
  }

  public function deleteComment($comment_id) {
    $this->comment_id = $comment_id;
    $this->getComment();
    $_SESSION['comment'] = $this->comment;
    if($this->comment['comment_user'] == $_SESSION['user_id'] || $_SESSION['user_role'] == 1) {
      $this->comment_id = $comment_id;
      $sql = "DELETE FROM comments WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->comment_id);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        echo true;
      } else {
        echo false;
      }
    } else {
      echo false;
    }
  }

  public function updateComment() {

  }


}

 ?>
