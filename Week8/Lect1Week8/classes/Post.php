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



}


 ?>
