<?php

class Post {

  public $title;
  public $body;
  public $author;
  public $id;
  public $conn;
  public $authorid;
  public $date_created;

  public function __construct($id, $conn) {
    $this->id = $id;
    $this->conn = $conn;
  }

  public function getPost() {
    $sql = "SELECT * FROM posts WHERE ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $rows = $results->fetch_assoc();
      $this->title = $rows['post_title'];
      $this->body = $rows['post_body'];
      $this->author = $rows['post_author'];
    } else {
      // send err message, post not found
    }

  }

  public function createPost() {

  }

  public function outputPost() {
    return "<h2 class='display-4'>{$this->title}</h2>
            <h4>{$this->author}</h4>
            <p>{$this->body}</p>";
  }

  public function deletePost() {

  }

  public function updatePost() {

  }




}



 ?>
