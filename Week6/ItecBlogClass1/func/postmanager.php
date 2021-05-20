<?php
$errors = [];
function checkPost($post, $file, &$errors, $conn) {
  $title = $post['title'];
  $body = $post['body'];
  $imgurl = validateFile($file, "img");
  var_dump($file);
  if(validateFile($file, "image")) {
    $errors['post_img'] = "There was a problem with your image upload!";
  }

  if($body == '' || $title == '') {
    $errors['post_title'] = "Post title and body cannot be empty!";
  }

  if(!$imgurl) {
    $errors['post_file'] = "There was a problem with your image upload!";
  }

  if(empty($errors)) {
    createPost($title, $body, $imgurl, $conn);
  }

}

function createPost($title, $body, $imgurl, $conn) {
  $sql = "INSERT INTO posts (post_title, post_body, post_author, post_img) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $title, $body, $_SESSION['user_id'], $imgurl);
  $stmt->execute();
  var_dump($stmt);
  if($stmt->affected_rows == 1) {
    redirectToPost($stmt->insert_id, "create=success");
  }
}


function getPost($id, $conn) {
  $sql = "SELECT posts.ID, posts.post_title, posts.post_body, posts.post_author, posts.date_created, users.user_name FROM posts JOIN users ON users.ID = posts.post_author";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $title, $body, $_SESSION['user_id']);
  $stmt->execute();
  $results = $stmt->get_result();
  if($results->num_rows == 1) {
    return $results->get_assoc();
  } else {
    return false;
  }
}

function getPosts($num_posts, $conn, $limit = 12, $offset = 0) {
  $sql = "SELECT posts.ID, posts.post_title, posts.post_body, posts.post_author, posts.date_created, posts.post_img, users.user_name FROM posts JOIN users ON users.ID = posts.post_author ORDER BY posts.date_created DESC LIMIT ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $num_posts);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function outputPosts($posts, $col = 3, $img = true, $teaserlen = 150, $readmore = true) {

  $output = "";

  foreach ($posts as $post) {
    if($img == true) {
      if($post['post_img'] == '') {
        $theimg = "images/default.png";
      } else {
        $theimg = $post['post_img'];
      }
      $postimg = "<img src='{$theimg}' style='max-width:100%'>";
    } else {
      $postimg = "";
    }
    $body = substr($post['post_body'], 0, $teaserlen);
    $output.= "<div class='col-md-{$col}'> {$postimg}
    <h3 class='font-weight-light'><a href='post.php?id={$post['ID']}'>Test: {$post['post_title']}</a></h3>
    <h4><em>{$post['user_name']}</em></h4>
    <p>{$body}</p>
    </div>";
  }
  return $output;
}

function redirectToPost($id, $get = false) {
  //$location = "Location: post.php?id={$id}&{$get}";

  header("Location: index.php");
}?>
