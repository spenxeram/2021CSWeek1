console.log("main js loaded");
// get needed elements
let form = document.querySelector(".comment-form");
let comment = document.querySelector(".comment-form textarea");
let hiddeninput = document.querySelector(".comment-form input");
// Event Listeners
form.addEventListener("submit", function(e) {
  e.preventDefault();
  commentAjax(comment.value, hiddeninput.value);
})

// AJAX request

function commentAjax(comment, postid) {
  let xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    "func/commentmanager.php",
    true
  );
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      console.log(this.responseText);
    }
  }

  xhr.send("comment="+comment+"&"+postid);
}

//General function
