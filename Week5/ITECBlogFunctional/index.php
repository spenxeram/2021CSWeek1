<?php
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
      <div class="row">
        <h2>Some content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
