console.log("script loaded");
// Get elements to be used
let searchinput = document.querySelector("input.search");
let ajaxoutputdiv = document.querySelector(".ajax-output");
let form = document.querySelector("form");

// Event Listeners
form.addEventListener("submit", function(event) {
  event.preventDefault();
  console.log("form submitted");
  let searchval = searchinput.value;
  ajaxManager("submit", searchval);
})
searchinput.addEventListener("keyup", function() {
  let searchval = searchinput.value;
  if(searchval == '') {
    ajaxoutputdiv.style.display = "none";
  } else {
    ajaxoutputdiv.style.display = "initial";
    ajaxManager("query", searchval);
  }

})

// AJAX Function
function ajaxManager(type, value) {
  if(type == "submit") {
    rtype = "&submit=true";
  } else {
    rtype = '';
  }
  let xhr = new XMLHttpRequest();
  let request = "ajax-search.php?q=" + value + rtype;
  xhr.open(
    "GET",
    request,
    true
  );

  xhr.onload = function() {
    if(this.status == 200) {
      console.log(this.responseText);
      if(this.responseText >= 1) {
        outputNumArticles(this.responseText);
      } else if (this.responseText == 0) {
        outputWarning();
      } else {
        let output = JSON.parse(this.responseText);
        outputSearchResults(output);
      }
    }
  }
  xhr.send();
}
// Helper/genderal function
function outputSearchResults(rows) {
  output = '';
  let articlesh2 = document.querySelector(".recent-articles h2");
  let articlesrow = document.querySelector(".recent-articles .row");

  rows.forEach((item) => {
    output+= `<div class="col-md-6"><h3><a  href="article.php?id=${item.ID}">${item.post_title}</a></h3>
    <p>${item.post_content}</p></div>`;
  });
  articlesh2.textContent = "Found articles.....";
  articlesrow.innerHTML = output;


}
function outputNumArticles(num) {
  let output = `<div class="alert alert-success mt-3" role="alert"> ${num} Article(s) were found!</div>`;
  ajaxoutputdiv.innerHTML = output;
}

function outputWarning() {
  let output = `<div class="alert alert-warning mt-3" role="alert"> No Articles were found!</div>`;
  ajaxoutputdiv.innerHTML = output;
}
