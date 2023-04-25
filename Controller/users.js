let button = document.querySelector("button");

button.addEventListener("click", () => {
  let request = new XMLHttpRequest();
  request.open("POST", "model/functions/logout.php");

  request.onload = () => {
    if (request.readyState == 4 && request.status == 200) {
      console.log(request.responseText);
      location.href = "signin.php";
    }
  };

  request.send();
});

let users_list = document.querySelector(".users_list");

let request = new XMLHttpRequest();

setInterval(() => {
  request.open("GET", "model/functions/users.php");
  request.onload = () => {
    if (request.readyState == 4 && request.status == 200) {
      let users = JSON.parse(request.responseText);
      let user = "";
      if (users.length == 0) {
        user = "No available users ";
      } else {
        for (let i = 0; i < users.length; i++) {
          let active = users[i]["status"] == "Offline now" ? "" : "active";

          user += `
            <div class="user ${active}" onclick=chat(${users[i]["unique_id"]})>
           
            <img src="model/images/${users[i].img}" alt="image">
         
                <h3 class="title"> ${users[i]["fname"]} ${users[i]["lname"]}</h3>
                <p > message</p>
          
            </div>
          
          `;
        }
      }
      users_list.innerHTML = user;
    }
  };
  request.send();
}, 500);

let icon = document.querySelector(".select-user i");

let select_user = document.querySelector(".select-user");

let searchInput = document.querySelector(".select-user input");
console.log(icon);
let search_users_list = document.querySelector(".users_list.searching");
searchInput.onkeyup = () => {
  users_list.style.display = "none";
  let input_term = searchInput.value.trim();
  request.open("GET", "model/functions/users.php");
  request.onload = () => {
    if (request.readyState == 4 && request.status == 200) {
      let users = JSON.parse(request.responseText);
      let user = "";
      for (let i = 0; i < users.length; i++) {
        if (
          users[i]["fname"].substring(0, input_term.length) == input_term ||
          users[i]["lname"].substring(0, input_term.length) == input_term ||
          `${users[i]["fname"]} ${users[i]["lname"]}`.substring(
            0,
            input_term.length
          ) == input_term ||
          input_term == ""
        ) {
          console.log(users[i]);
          let active = users[i]["status"] == "Offline now" ? "" : "active";

          user += `
          <div class="user  ${active}" onclick=chat(${users[i]["unique_id"]})>
          
          <img src="model/images/${users[i].img}" alt="image">
  
              <h3 class="title"> ${users[i]["fname"]} ${users[i]["lname"]}</h3>
              <p > message</p>
    
         
          </div>
        
        `;
        }
      }

      if (user == "") {
        search_users_list.classList.add("no-user");
        console.log(search_users_list);
        search_users_list.innerHTML =
          "No user found related to your search term ";
      } else {
        search_users_list.innerHTML = user;
      }
    }
  };
  request.send();
};

function chat(id) {
  location.href = `./chat.php?id=${id}`;
}
