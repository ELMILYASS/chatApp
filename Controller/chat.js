let form = document.querySelector("form");
let button = document.querySelector("button");
let input = document.querySelector("form input");
let msgs = document.querySelector(".msgs");
let id = document.querySelector(".id_receiver");
let span = document.querySelector("form span");
span.style.display = "none";

setInterval(() => {
  let request = new XMLHttpRequest();
  request.open("POST", "model/functions/chat.php");
  request.onload = () => {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "session finished") {
        location.href = "signin.php";
      } else {
        msgs.innerHTML = request.responseText;
      }
    }
  };

  let form = new FormData();
  form.append("id_receiver", +id.innerHTML);

  request.send(form);
}, 500);

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

button.addEventListener("click", () => {
  let message = input.value.trim();

  let request = new XMLHttpRequest();
  request.open("POST", "model/functions/add_message.php");
  request.onload = () => {
    if (request.readyState == 4 && request.status == 200) {
      let response = request.responseText;
      input.value = "";
      if (response == "success") {
      } else {
        if (response == "session finished") {
          location.href = "signin.php";
        } else {
          span.innerHTML = response;
          span.style.display = "block";
          setTimeout(() => {
            span.style.display = "none";
          }, 2000);
          input.focus();
        }
      }
    }
  };

  let form = new FormData();
  form.append("id_receiver", +id.innerHTML);
  form.append("message", message);
  request.send(form);
});

let left = document.querySelector(".container.chat .friend img.icon");
console.log(left);
left.addEventListener("click", () => {
  location.href = "users.php";
});
