console.log("main js loaded");
// get needed elements
let form = document.querySelector(".comment-form");
let comment = document.querySelector(".comment-form textarea");
let hiddeninput = document.querySelector(".comment-form input");
let commentsdiv = document.querySelector(".comments");
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
      let output = JSON.parse(this.responseText);
      outputNewComment(output);
    }
  }

  xhr.send("comment="+comment+"&"+postid);
}

//General function
function outputNewComment(row) {
  let div = document.createElement("div");
  div.classList = "col-md-8"
  let output = '<div class="card mt-2 mb-2"><div class="card-header">' + row.user_name + ' | ' + row.date_created + '</div><div class="card-body"><p class="card-text">' +row.comment_text+ '</p></div></div>';
  commentsdiv.prepend(div);
  div.innerHTML = output;
}
