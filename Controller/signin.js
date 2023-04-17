let form = document.querySelector("form");
let button = document.querySelector("button");
let error = document.querySelector(".error");

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

button.addEventListener("click", () => {
  let request = new XMLHttpRequest();
  request.open("POST", "model/functions/signin.php");

  request.onload = function () {
    if (request.status == 200 && request.readyState == 4) {
      let response = request.responseText;

      if (response == "success") {
        location.href = "users.php";
      } else {
        error.innerHTML = response;
        error.style.display = "block";
      }
    }
  };
  let formData = new FormData(form);
  request.send(formData);
});
