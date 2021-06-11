<hr>
<h3 class="display-4 mt-3 mb-3">Comments</h3>
<hr>

<div class="row comment-form">
 <div class="col-md-8 form">
   <?php if ($_SESSION['loggedin']): ?>
     <form class="comment-form" method="POST" action="func/ajaxmanager">
       <textarea name="comment-text" class="form-control" rows="4" cols="80"></textarea>
       <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
       <button type="submit" name="comment-submit" class="comment-submit btn btn-outline-success mt-2"><i class="far fa-comment"></i> Add Comment</button>
     </form>

   <?php else: ?>
     <h3>Please login to comment!</h3>
     <a href="login.php"><button type="button" class="btn btn-primary btn-lg">Login</button></a>
   <?php endif; ?>
 </div>
 </div>
<div class="row comments">
  <?php foreach ($comments->comments as $comment): ?>
   <?php
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['comment_user'] || $_SESSION['user_role'] == 1) {
      $button = "<button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='{$comment['CID']}'>X</button>";
    } else {
      $button = "";
    }
    ?>
    <div class='comment-wrapper col-md-12'>
      <div class='col-md-9 mt-2 mb-2 comment'>
        <div class='card'>
          <div class='card-header'>
            <a href='user.php?id=<?php echo $comment['UID']; ?>' class='comment-user-id' data-comment-user-id='<?php echo $comment['UID']; ?>'><?php echo $comment['user_name']; ?></a> | <?php echo $comment['date_created']; ?>
            <nav class="comment-thumb">
              <ul class="nav float-right">
                <li class="nav-item">
                <i class="fas fa-thumbs-up thumb" data-review-value="1" data-review-type="thumb"></i>
                </li>
                <li class="nav-item">
                400
                </li>
                <li class="nav-item">
                  <i class="fas fa-thumbs-down thumb"  data-review-value="0" data-review-type="thumb"></i>
                </li>
                <li class="nav-item">
                  200
                </li>
              </ul>
            </nav>
          </div>
          <div class='card-body'>
            <p class='card-text'><?php echo $comment['comment_text']; ?></p>
              <?php echo $button; ?> <button class='btn float-right btn-sm btn-outline-secondary mr-2 reply-comment' data-comment-id='<?php echo $comment['CID']; ?>' data-comment-user-id='<?php echo $comment['UID']; ?>'>reply</button>
          </div>
        </div>
        </div>
        <?php
        // $theid = $comment['CID'];
        // $thereply = array_filter($replies->replies, function($data) use ($theid) {
        //   return $data['comment_parent'] === $theid;
        // });
        ?>
      
      </div>
  <?php endforeach; ?>
 </div>
