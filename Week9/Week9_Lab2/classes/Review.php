<?php

class Review {
  //properties
  public $review_value;
  public $review_type;
  public $comment_id;
  public $user_id;
  public $post_id;
  public $review_id;
  public $review = [];
  public $reviews = [];
  public $conn;

  //constructor
  public function __construct($conn) {
    $this->conn = $conn;
  }

  // methods
  public function setReviewProperties($review_value, $review_type, $comment_id) {
    $this->review_type = $review_type;
    $this->review_value = $review_value;
    $this->comment_id = $comment_id;
    $this->user_id = $_SESSION['user_id'];
    $post_id = explode("=", $_SESSION['query_history'][4]);
    $this->post_id = $post_id[1];
  }

  public function createReview() {
    // check if user has already reviewed this comment, if so updateReview
    // otherwise create new review row
    $sql = "SELECT * FROM reviews WHERE user_id = ? AND comment_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $this->user_id, $this->comment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
      $this->updateReview();
    } else {
      //create the new review
      $sql = "INSERT INTO reviews (review_value, user_id, comment_id, post_id) VALUES (?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("iiii", $this->review_value, $this->user_id, $this->comment_id, $this->post_id);
      $stmt->execute();
      echo $stmt->affected_rows;
    }
  }

  public function updateReview() {
    echo "review updated!";
  }





}

 ?>
