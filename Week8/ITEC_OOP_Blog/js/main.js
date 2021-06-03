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
  commentAjax(thecomment.value, hiddeninput.value);
  theform.reset();
})

commentcard.forEach((card, i) => {
  card.addEventListener("click", function(e) {
    e.preventDefault();
    console.log("click");
    if(e.target.classList.contains("delete-post")){
      console.log("delete");
      let par = e.target.parentNode.parentNode.parentNode;
      console.log(par);
      par.classList.add("shrinkStart");
      setTimeout(function(){
        par.classList.add("shrinkFinish");
      },100);
    }

    console.log(e);
  })

});


// ajax request

function commentAjax(comment, postid) {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/commentmanager.php", true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      console.log(this.responseText);
      let output = JSON.parse(this.responseText);
      console.log(output);

      outputNewComment(output);
    }
  }

  xhr.send("comment="+comment+"&"+postid);
}

// General function
function outputNewComment(output) {
  let newdiv = document.createElement("div");
  newdiv.classList = "col-md-7 mt-2 mb-2";
  commentsdiv.prepend(newdiv);
  let theoutput = `<div class="card"><div class="card-header">${output.user_name} | ${output.date_created}</div>
  <div class="card-body"><p class="card-text">${output.comment_text}</p>
  </div></div>`;
  newdiv.innerHTML = theoutput;

}
