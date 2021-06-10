<?php

class Reply extends Comment {

  public $reply_to_comment_id;
  public $reply_to_user_id;
  public $rely = [];
  public $replies = [];

  public function setReplyDetails($reply_to_comment_id, $reply_to_user_id, $comment_text) {
    $this->reply_to_comment_id =  $reply_to_comment_id;
    $this->reply_to_user_id =  $reply_to_user_id;
    $this->comment_text = $comment_text
  }

  // get a collection of replies
  public function getReplies() {

  }

  // get singular Reply
  public function getReply() {

  }

  public createReply() {

  }





}


 ?>
