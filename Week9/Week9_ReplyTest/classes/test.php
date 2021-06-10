<div class='comment-wrapper col-md-12'>
            <div class='col-md-8 mt-2 mb-2 comment'>
              <div class='card'>
                <div class='card-header'>
                  <a href='user.php?id={$comment['UID']}' class='comment-user-id' data-comment-user-id='{$comment['UID']}'>{$comment['user_name']}</a> | {$comment['date_created']}
                  {$button} <button class='btn float-right btn-sm btn-outline-secondary mr-2 reply-comment' data-comment-id='{$comment['CID']}'>reply</button>
                </div>
                <div class='card-body'>
                  <p class='card-text'>{$comment['comment_text']}</p>
                </div>
              </div>
              </div>
              </div>"
