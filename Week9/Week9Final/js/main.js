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
      console.log(this.responseText);
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

function replyCommentAjax(comment_id, reply_user_id, parent_card, comment_text, reply_form) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/ajaxmanager.php", true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      console.log(this.responseText);
      let result = JSON.parse(this.responseText);
      console.log(result);
      if (result.hasOwnProperty('CID')) {
        outputNewComment(result, false, parent_card);
        console.log(parent_card);
        reply_form.remove();
      } else {
        console.log("CID not found");
      }
    }
  }
  xhr.send("reply-comment=true&comment_id="+comment_id+"&reply_user_id="+reply_user_id+"&comment_text="+comment_text);
}

function thumbAjax(review_value, review_type, comment_id, el) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/ajaxmanager.php", true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      let results = JSON.parse(this.responseText);
      console.log(results);
      if(results.review == "new" && results.affected_rows == 1) {
        let thumbval = el.parentElement.nextElementSibling.innerText;
        el.parentElement.nextElementSibling.innerText = parseInt(thumbval) + 1;
        el.classList.add("active");
      } else if (results.review == "updated" && results.affected_rows == 1) {
        let thumbwrapper = el.closest("nav.comment-thumb");
        if(thumbwrapper.querySelector(".active") != null) {
          thumbwrapper.querySelector(".active").classList.remove("active");
        }
        el.classList.add("active");
        if(el.classList.contains("fa-thumbs-down")) {
          let thumbval1 = thumbwrapper.querySelector(".thumbs-down-val");
          thumbval1.innerText = parseInt(thumbval1.innerText) + 1;
          let thumbval2 = thumbwrapper.querySelector(".thumbs-up-val");
          thumbval2.innerText = parseInt(thumbval2.innerText) - 1;
        } else {
          let thumbval1 = thumbwrapper.querySelector(".thumbs-up-val");
          thumbval1.innerText = parseInt(thumbval1.innerText) + 1;
          let thumbval2 = thumbwrapper.querySelector(".thumbs-down-val");
          thumbval2.innerText = parseInt(thumbval2.innerText) - 1;
        }
      }
    }
  }
  xhr.send("review_value="+review_value+"&review_type="+review_type+"&comment_id="+comment_id);
}

// General function
function outputNewComment(output, iscomment = true, parent = false) {
  let wrapperdiv = document.createElement('div');
  if(iscomment) {
    wrapperdiv.classList = "col-md-8 mt-2 mb-2 shrink comment-wrapper";
    let theoutput = `<div class="card"><div class="card-header">${output.user_name} | ${output.date_created} <button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='${output.comment_id}'>X</button></div>
    <div class="card-body"><p class="card-text">${output.comment_text}</p>
    </div></div>`;
    wrapperdiv.innerHTML = theoutput;
    commentsdiv.prepend(wrapperdiv);
  } else {
    wrapperdiv.classList = "col-md-8 offset-md-1 mb-1 comment reply";
    let theoutput = `<div class="card"><div class="card-header" style="background:lightgrey">${output.user_name} | ${output.date_created} <button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='${output.comment_id}'>X</button></div>
    <div class="card-body"><p class="card-text">${output.comment_text}</p>
    </div></div>`;
    wrapperdiv.innerHTML = theoutput;
    parent.append(wrapperdiv);
  }
  console.log(wrapperdiv);
  setTimeout(function(){
    wrapperdiv.classList.remove("shrink");
  },10);

  setTimeout(function(){
    wrapperdiv.classList.add("grow");
  },20);
  setTimeout(function(){
    notification("New comment added", "success", "far fa-plus-square");
  },300);


}



  commentsdiv.addEventListener("click", function(e) {
    e.preventDefault();
    if(e.target.classList.contains("delete-post")){
      deletePost(e.target);
    } else if (e.target.classList.contains("reply-comment")) {
      replyToComment(e.target);
    } else if (e.target.classList.contains("comment-submit")) {
      submitComment(e.target);
    } else if (e.target.classList.contains("thumb")) {
      console.log(e.target);
      createThumbReview(e.target);
    }
  });

function deletePost(el) {
  let comment_id = el.getAttribute("data-comment-id");
  console.log("delete:" + comment_id);
  let parent_card = el.closest(".comment-wrapper");
  deleteCommentAjax(comment_id, parent_card);
}

function replyToComment(el) {
  let comment_id = el.getAttribute("data-comment-id");
  let reply_user_id = el.getAttribute("data-comment-user-id");
  console.log("reply user id = " + reply_user_id);
  console.log("reply to:" + comment_id);
  let parent_card = e.target.closest(".comment");
  let formclone = theform.cloneNode(true);
  formclone.setAttribute("data-comment-id", comment_id);
  formclone.setAttribute("data-comment-user-id", reply_user_id);
  formclone.classList = "comment-form col-md-12 mt-2";
  parent_card.classList.add("active-reply");
  parent_card.append(formclone);
}

function submitComment(el) {
  let reply_form = el.closest("form")
  let comment_id = reply_form.getAttribute("data-comment-id");
  let reply_user_id = reply_form.getAttribute("data-comment-user-id");
  let comment_text = reply_form.querySelector("textarea").value;
  let parent_card = e.target.closest(".comment-wrapper");
  parent_card.classList.remove("active-reply");
  replyCommentAjax(comment_id, reply_user_id, parent_card, comment_text, reply_form);
}

function createThumbReview(el) {
  // needed vals: comment_id (reply btn), review-value, review-review_type
  let review_value = el.getAttribute("data-review-value");
  let review_type = el.getAttribute("data-review-type");
  let parent_card = el.closest(".card");
  let comment_id = parent_card.querySelector(".reply-comment").getAttribute("data-comment-id");

  thumbAjax(review_value, review_type, comment_id, el);

}

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
