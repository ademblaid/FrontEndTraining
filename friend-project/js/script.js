var linkOptions = document.getElementById("linkOptions");
var currentLink = null;
var editor = document.getElementById("editor");
var hiddenInput = document.getElementById("hiddenInput");

function createLink(element) {
  var url = prompt("Enter the URL");
  document.execCommand("createLink", false, url);
  element.classList.remove("active");
}

editor.addEventListener("mouseup", function (e) {
  if (e.target.tagName === "A") {
    currentLink = e.target;
    linkOptions.style.display = "block";
    linkOptions.style.left = e.clientX + "px";
    linkOptions.style.top = e.clientY + "px";
  } else {
    linkOptions.style.display = "none";
  }
});

editor.addEventListener("input", function () {
  hiddenInput.value = this.innerHTML;
});

function modifyLink() {
  var newUrl = prompt("Enter the new URL");
  currentLink.href = newUrl;
  linkOptions.style.display = "none";
}

function goToLink() {
  window.open(currentLink.href, "_blank");
}

function toggleCommand(command, element, event) {
  event.preventDefault();
  document.execCommand(command);
  element.classList.toggle("active");
  document.getElementById('editor').focus();  // Set focus back to the editable area
}
