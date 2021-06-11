<?php

class Reply extends Comment {
  public $reply_user_id;
  public $reply_to_comment_id;
  public $replies = [];

  public function setReplyDetails($reply_to_comment_id, $reply_user_id, $comment_text) {
    $this->reply_user_id = $reply_user_id;
    $this->reply_to_comment_id = $reply_to_comment_id;
    $this->comment_text = $comment_text;
  }

  public function createReply() {
    $sql = "INSERT INTO comments (comment_text, comment_user, comment_post, comment_parent, reply_to_user) VALUES (?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("siiii", $this->comment_text, $_SESSION['user_id'], $this->comment_post_id, $this->reply_to_comment_id, $this->reply_user_id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->comment_id = $stmt->insert_id;
      // this will return the comment as a json encoded string
      $this->getComment();
    } else {
      return false;
    }
  }

  public function getComment() {
    $sql = "SELECT c.ID as CID, c.comment_text, c.date_created, u1.user_name, c.comment_user AS UID, c.comment_parent, u2.user_name AS response_to_user FROM comments c JOIN users u1 ON u1.ID = c.comment_user JOIN users u2 ON u2.ID = c.reply_to_user WHERE c.ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->comment_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->comment = $results->fetch_assoc();
  }


  public function getReplies() {
    $sql = "SELECT c.ID as CID, c.comment_text, c.comment_post, c.date_created, u1.user_name, c.comment_user AS UID, c.comment_parent, u2.user_name AS response_to_user FROM comments c JOIN users u1 ON u1.ID = c.comment_user JOIN users u2 ON u2.ID = c.reply_to_user WHERE c.comment_post = ? AND c.comment_parent IS NOT NULL ORDER BY c.date_created ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->comment_post_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->replies = $results->fetch_all(MYSQLI_ASSOC);
  }


}
