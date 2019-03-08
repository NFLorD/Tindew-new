const cacheDiv = document.querySelector("div#cache");
document
  .querySelectorAll("a[data-id]")
  .forEach(link => link.addEventListener("click", getComments));

function getComments() {
  let id = this.dataset.id;
  let fetched = "getComments.php?statusid=" + id;
  let content = this.parentElement.innerHTML;
  fetch(fetched)
    .then(response => response.json())
    .then(function(json) {
      let comments = document.querySelector("div#comments");
      comments.innerHTML = "";
      comments.innerHTML += content + "<hr>";
      comments.removeChild(document.querySelector("#comments>a:first-of-type"));
      json.forEach(function(array) {
        comments.innerHTML +=
          "<img class='rounded float-left mr-3' style='height: 45px' src='" +
          array.user_id.avatar +
          "' alt='Her/his picture'>";
        comments.innerHTML +=
          "<a href='profile.php?id=" +
          array.user_id.id +
          "'><em>" +
          array.user_id.firstName +
          " " +
          array.user_id.lastName +
          "</em></a>";
        comments.innerHTML += "<p>" + array.content + "</p>";
        comments.innerHTML +=
          "<small style='display: block; text-align: right; width: 100%'>" +
          array.createdAt +
          "</small>";
      });

      comments.innerHTML += `<br><br>
                <div class="input-group">
                    <textarea class="form-control" aria-label=""></textarea>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Send</button>
                    </div>
                </div>`;

      cacheDiv.classList.add("show");
      comments.classList.add("show");
      comments.style.top = window.scrollY - 200 + "px";
      cacheDiv.addEventListener("click", hideCache);
      function hideCache() {
        if (document.querySelector("#comments textarea").value != "") {
          if (window.confirm("Your message will be lost ! Proceed ?")) {
            cacheDiv.classList.remove("show");
            comments.classList.remove("show");
          }
        } else {
          cacheDiv.classList.remove("show");
          comments.classList.remove("show");
        }
      }
    });
}
