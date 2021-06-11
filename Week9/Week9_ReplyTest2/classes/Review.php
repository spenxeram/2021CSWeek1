<?php

class Review {
  public $user_id;
  public $post_id;
  public $review_id;
  public $comment_id;
  public $review_value;
  public $review_type = "thumb";
  public $conn;
  public $review = [];
  public $reviews = [];

  public function __construct($conn, $post_id = "") {
    $this->conn = $conn;
    $this->post_id = $post_id;
  }

  public function createReview() {
    $sql = "SELECT * FROM reviews WHERE user_id = ? AND comment_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $_SESSION['user_id'],$this->comment_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->updateReview();
    } else {
      $sql = "INSERT INTO reviews (user_id, post_id, comment_id, review_value) VALUES (?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("iiii", $_SESSION['user_id'], $this->post_id, $this->comment_id, $this->review_value);
      $stmt->execute();
      echo $stmt->affected_rows;
   }
  }

  public function updateReview() {
    echo "update";
  }

  public function setReviewDetails($review_value, $review_type, $comment_id) {
    $this->review_value = $review_value;
    $this->review_type = $review_type;
    $this->comment_id = $comment_id;
  }

  public function getReview() {

  }

  public function getReviews() {
    $sql = "SELECT SUM(review_value = 1) as thumbs_up, SUM(review_value = 0) as thumbs_down, comment_id from reviews WHERE post_id = ? GROUP BY comment_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->post_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->replies = $results->fetch_all(MYSQLI_ASSOC);
  }


}

 ?>
