const cacheDiv = document.querySelector("div#cache");
document
  .querySelectorAll("a[data-id]")
  .forEach(link => link.addEventListener("click", getComments));

const connected = document.getElementById("connected");
const commentsCapsule = document.querySelector("#commentsCapsule");

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
      // comments.removeChild(document.querySelector("#comments>a:first-of-type"));
      json.forEach(function(array) {
        comments.innerHTML +=
          "<img class='rounded float-left mr-3' style='height: 45px' src='" +
          array.user_id.avatar +
          "' alt='Her/his picture'>";
        comments.innerHTML +=
          "<a href='profile/" +
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

      let commentBtn = document.querySelector("#commentBtn");
      if(connected.value == 1){
        commentBtn.addEventListener("click", sendCom);
      }

      function sendCom(){
        let content = document.querySelector("#commentsCapsule textarea").value;
        let req = new XMLHttpRequest();
        req.open("post", "index.php?page=CommentsController&method=create");
        let packet = new FormData();
        packet.append('content', content);
        packet.append('status_id', id);
        req.send(packet);

        document.querySelector("#commentsCapsule textarea").value = "";
        comments.innerHTML +=
        "<img class='rounded float-left mr-3' style='height: 45px' src='" +
        user.avatar +
        "' alt='Her/his picture'>";
        comments.innerHTML +=
        "<a href='profile/" +
        user.id +
        "'><em>" +
        user.firstName +
        " " +
        user.lastName +
        "</em></a>";
        comments.innerHTML += "<p>" + content + "</p>";
        comments.innerHTML +=
        "<small style='display: block; text-align: right; width: 100%'>" +
        new Date() +
        "</small>";;
      }
       
      

      cacheDiv.classList.add("show");
      commentsCapsule.classList.add("show");
      commentsCapsule.style.top = window.scrollY - 150 + "px";
      cacheDiv.addEventListener("click", hideCache);
      function hideCache() {
        if(connected.value == 1){
          if (document.querySelector("#commentsCapsule textarea").value != "") {
            if (window.confirm("Your message will be lost ! Proceed ?")) {
              cacheDiv.classList.remove("show");
              commentsCapsule.classList.remove("show");
            }
          } 
        } else {
          cacheDiv.classList.remove("show");
          commentsCapsule.classList.remove("show");
        }
       } 
      
    });
}
