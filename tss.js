// This script gets the mp3 file name, guest and date of the TSS shows from the Winhost site.
// To use go to the winhost site and copy and paste into the
// browser console
function outputtable() {
let blockquote = document.querySelector("blockquote");
let newtable = document.createElement("table");
let newtbody = document.createElement("tbody");
let newthead = document.createElement("thead");
let newthrow = newthead.insertRow();
newtable.append(newthead);
newtable.append(newtbody);
let newthshow = document.createElement("th");
newthshow.textContent = "File";
newthrow.append(newthshow);
let newthguest = document.createElement("th");
newthguest.textContent = "Guest";
newthrow.append(newthguest);

let newthdate = document.createElement("th");
newthdate.textContent = "Date";
newthrow.append(newthdate);
console.log(newthrow);

console.log(newtable);
blockquote.append(newtable);
}

function getData() {
let newtbody = document.querySelector("tbody");
let tssrows = document.querySelectorAll("tr.hiliteRow");
tssrows.forEach((item) => {
  let newrow = newtbody.insertRow();
  let oldtd = item.querySelectorAll("td");
  let olda = item.querySelector("a");
  let newshow = document.createElement("td");
  let newguest = document.createElement("td");
  let theshow = olda.getAttribute("href");
  let newdate = document.createElement("td");
  newdate.textContent = theshow.substr((theshow.length-14),10);
  let guesttext = oldtd[1].textContent;
  if(guesttext.substr(0,7) == "Special") {
    newguest.textContent = guesttext.substr(29,25);
  } else {
    newguest.textContent = guesttext.substr(10,25);
  }
  theshow = theshow.split("/");
  console.log(theshow);
  newshow.textContent = theshow[theshow.length-1];
  newrow.append(newdate);
  newrow.append(newshow);
  newrow.append(newguest);

})
}

outputtable();
getData();
