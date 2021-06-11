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





}

 ?>
