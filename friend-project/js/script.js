  document.addEventListener("DOMContentLoaded", function () {
  const quill = new Quill("#editor", {
    theme: "snow"
  });

  const hiddenContentInput = document.getElementById("hiddenContent");

  quill.on("text-change", function () {
    hiddenContentInput.value = quill.root.innerHTML;
  });
});
