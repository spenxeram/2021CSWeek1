console.log("main js loaded");

// get needed elements
let theform = document.querySelector("form.comment-form");
let thecomment = document.querySelector(".comment-form textarea");
let hiddeninput = document.querySelector(".comment-form input");
let commentsdiv = document.querySelector(".comments");
let commentcard = document.querySelectorAll(".card");

// add event listener, prevent default submission and get
//textarea value

theform.addEventListener("submit", function(event) {
  event.preventDefault();
  let querystring = hiddeninput.value;
  let postid = querystring.split("=");
  let comment = thecomment.value;
  let theaction = "func/ajaxmanager.php";
  commentAjax(comment, postid[1], theaction);
  theform.reset();
})



// ajax request

function commentAjax(comment, postid, theaction) {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", theaction, true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      console.log(JSON.parse(this.responseText));
      outputNewComment(JSON.parse(this.responseText));
    }
  }
  xhr.send("comment="+comment+"&post_id="+postid);
}

function deleteCommentAjax(comment_id, parent_card) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/ajaxmanager.php", true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      if(this.responseText == true) {
        parent_card.classList.add("shrinkStart");
        setTimeout(function(){
          parent_card.classList.add("shrinkFinish");
        },100);
        setTimeout(function(){
          parent_card.remove();
          notification("Comment successfully removed!", "success", "fas fa-check-circle");
        },400);
      } else {
        notification("Could not remove this comment!", "danger", "fas fa-times");
      }

    }
  }
  xhr.send("delete-comment=true&comment_id="+comment_id);
}


// General function
function outputNewComment(output) {

  let theoutput = `<div class="col-md-8 mt-2 mb-2"><div class="card"><div class="card-header">${output.user_name} | ${output.date_created}</div>
  <div class="card-body"><p class="card-text">${output.comment_text}</p>
  </div></div></div>`;

  theform.insertAdjacentHTML("afterend", theoutput);

}


commentcard.forEach((card, i) => {
  card.addEventListener("click", function(e) {
    e.preventDefault();
    console.log("click");
    if(e.target.classList.contains("delete-post")){
      let comment_target = e.target;
      let comment_id = e.target.getAttribute("data-comment-id");
      console.log("delete:" + comment_id);
      let parent_card = e.target.parentNode.parentNode.parentNode;
      deleteCommentAjax(comment_id, parent_card);
    }

    console.log(e);
  })

});

function notification(msg, msgClass, icon = "") {
  let overlay = document.createElement("div");
  overlay.classList = "overlay";
  let notification = `<div class='alert alert-${msgClass}'><i class="${icon}"></i> ${msg}</div>`;
  overlay.innerHTML = notification;
  let body = document.querySelector("body");
  body.append(overlay);
  setTimeout(function() {
    overlay.style.opacity = "1";
  }, 10);
  setTimeout(function() {
    overlay.style.opacity = "0";
  }, 1500);
  setTimeout(function() {
    overlay.remove();
  }, 1800);
}
