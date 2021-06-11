<?php

class Review {

  public $user_id;
  public $review_id;
  public $review_type;
  public $review_value;
  public $review = [];
  public $reviews = [];
  public $post_id;
  public $comment_id;
  public $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function setReviewProperties($review_type, $review_value, $comment_id = '') {
    $this->review_type = $review_type;
    $this->review_value = $review_value;
    $this->comment_id = $comment_id;
    $post_id = explode("=",$_SESSION['query_history'][4]);
    $this->post_id = $post_id[1];
    $this->user_id = $_SESSION['user_id'];
  }

  public function createReview() {
    // check to see if review from user already exists (update) else insert new review
    $sql = "SELECT * FROM reviews WHERE user_id = ? AND comment_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $_SESSION['user_id'], $this->comment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
      $this->updateReview();
    } else {
      $sql = "INSERT INTO reviews (review_value, user_id, comment_id, post_id) VALUES (?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("iiii", $this->review_value, $this->user_id, $this->comment_id, $this->post_id);
      $stmt->execute();
      $review_results = [
        "affected_rows" => $stmt->affected_rows,
        "new_review" => true
      ];
      echo json_encode($review_results);
    }
  }

  public function updateReview() {
    $sql = "UPDATE reviews SET review_value = ? WHERE user_id = ? AND comment_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("iii", $this->review_value, $this->user_id, $this->comment_id);
    $stmt->execute();
    $review_results = [
      "affected_rows" => $stmt->affected_rows,
      "new_review" => false
    ];
    echo json_encode($review_results);
  }




}


 ?>
