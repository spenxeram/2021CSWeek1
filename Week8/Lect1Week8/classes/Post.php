<?php
class Post {
  public $title;
  public $body;
  public $author;
  public $date;
  public $id;
  public $posts_array = [];
  public $conn;

  public function __construct($id, $conn) {
    $this->id = $id;
    $this->conn = $conn;
  }

  public function outputPost() {
    return "<h1>" . $this->title . "</h1>"
          . "<h4>" . $this->author . "</h4>"
          . "<p>" . $this->body . "</p>";
  }

  public function getPost() {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    $results = $stmt->get_result();
    $row = $results->fetch_assoc();
    $this->title = $row['post_title'];
    $this->body = $row['post_body'];
    $this->author = $row['post_author'];
  }

  public function deletePost() {
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      echo "<h1 class='display-2'>Post was deleted!</h1>".
      "<a href='index.php?id=1'><button class='btn btn-primary'>Return Home</button></a>";
    } else {
     echo '<div class="alert alert-danger" role="alert">
        Row not found or deleted!
      </div>';
    }
  }



}


 ?>
