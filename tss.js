let tssrows = document.querySelectorAll("tr.hiliteRow");
let newtable = document.createElement("table");
let newtbody = document.createElement("tbody");
let newthead = document.createElement("thead");
let newthshow = document.createElement("th");
newthshow.textContent = "File";
newthead.append(newthshow);
let newthguest = document.createElement("th");
newthshow.textContent = "Guest";
newthead.append(newthguest);
let newthdate = document.createElement("th");
newthshow.textContent = "Date";
newthead.append(newthshow);
tssrows.forEach((item) => {
  let newrow = newtbody.insertRow();
  let oldtd = item.querySelectorAll("td");
  let newshow = document.createElement("td");
  let newguest = document.createElement("td");
  let newdate = document.createElement("td");
  newdate.textContent = oldtd.firstElementChild.text;
  newguest.textContent = oldtd[1].text;
  let theshow = oldtd.firstElementChild.getAttribute("href");
  theshow = theshow.split("/");
  newshow.textContent = theshow[theshow.length-1];
  newrow.append(newdate);
  newrow.append(newshow);
  newrow.append(newguest);

})
