<?php
include 'func/config.php';
include 'func/postmanager.php';
include 'func/ajax.php';
include 'includes/header.php';
 ?>
    <div class="jumbotron jumbotron-fluid text-white">
      <div class="container">
        <h1 class="display-3">Itec Blog 2021</h1>
        <p class="lead">Click the button to trigger an AJAX request that returns the number of posts.</p>
        <button type="button" class="btn btn-outline-primary ajax">Check Number of Posts</button>
        <p class="num-posts"></p>
      </div>
    </div>
    <div class="container">
      <?php if (isset($_GET['login'])): ?>
        <div class="alert alert-success" role="alert">
          You have logged in successfully!
        </div>
      <?php elseif(isset($_GET['logout'])): ?>
      <div class="alert alert-warning" role="alert">
        You have logged out successfully!
      </div>
      <?php endif; ?>
      <h2>Recent Articles</h2>
      <hr>
      <div class="row">

        <?php
        $posts = getPosts(12, $conn);
        echo outputPosts($posts);
         ?>
        <hr>
        </div>
    </div>
<script type="text/javascript">
  let ajax = document.querySelector(".ajax");
  ajax.addEventListener("click", function(){
    console.log("ajax request");
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "func/ajax.php", true);
    xhr.onload = function() {
      if(this.status == 200) {
        console.log(this.responseText);
        let numposts = document.querySelector(".num-posts");
        let output = "<ul>";
        let result = JSON.parse(this.responseText);
        console.log(result);
        result.forEach((item, i) => {
          output+= `<li>${item['post_title']}</li>`;
        });

        output+= "</ul>";
        console.log(output);
        numposts.innerHTML = output;

      }
    }
    xhr.send();
  })

</script>
<?php
include 'includes/footer.php';
 ?>
