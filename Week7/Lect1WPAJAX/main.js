console.log("script loaded");
let searchinput = document.querySelector("input.search");
console.log(searchinput);
let outputdiv = document.querySelector(".ajax-output");
let form = document.querySelector("form");
form.addEventListener("submit", function(e) {
  e.preventDefault();
  console.log("form submitted");
  let searchText = searchinput.value;
  ajaxRequest("submit", searchText);
})
searchinput.addEventListener("keyup", function() {
 let searchText = searchinput.value;
 console.log(searchText);
 if(searchText == '') {
   outputdiv.style.display = "none";
 } else {
   outputdiv.style.display = "initial";
   ajaxRequest("query", searchText);
 }
})

function ajaxRequest(type, input) {
  if(type == "submit") {
    method = 'submit=true&';
  } else {
    method = '';
  }
  let xhr = new XMLHttpRequest();
  let request = "ajax_search.php?" + method + "query=" + input;
  xhr.open(
    "GET",
    request,
    true
  );
  xhr.onload = function(){
    if(this.status == 200) {
     if(this.responseText >= 1) {
       outputsuccess(this.responseText);
     } else if(this.responseText == 0) {
       outputwarning();
     } else {
       let output = JSON.parse(this.responseText);
       outputSearchArticles(output);
     }
    }
  }
  xhr.send();
}

function outputSearchArticles(output) {
  let container = document.querySelector(".recent-articles");
  let containerh2 = document.querySelector(".recent-articles h2");
  containerh2.textContent = "Search Results";
  let containerrow = document.querySelector(".recent-articles .row");
  let content = '';
  output.forEach((item) => {
    content+= `<div class='col-md-4'><h3><a href="article.php?id=${item.ID}"> ${item.post_title}</a></h3>
    <p>${item.post_content}</p></div>`;
  });
  containerrow.innerHTML = content;
}

function outputwarning() {
  let output = `<div class="alert alert-warning mt-3" role="alert">No Articles were found!</div>`;
  outputdiv.innerHTML = output;
}

function outputsuccess(num) {
  let output = `<div class="alert alert-success mt-3" role="alert">${num} Articles were found!</div>`;
  outputdiv.innerHTML = output;
}
