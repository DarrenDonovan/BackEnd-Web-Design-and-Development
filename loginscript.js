const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");
const btn = document
  .getElementById("submit-btn")
  .addEventListener("click", checkUsername);

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

function checkUsername(event) {
  console.log("checkUsername() called");
  event.preventDefault();
  let usernameInput = document.getElementById("username");
  let username = usernameInput.value;

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/check_username.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({ username: username }));
  console.log(username);
  console.log(JSON.stringify({ username: username }));
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      let response = JSON.parse(xhr.responseText);
      if (response.exists == true) {
        console.log("Username exists!");
        let errorMessage = document.getElementById("username-error");
        errorMessage.style.display = "block";
      } else {
        console.log("Username does not exist!");
        let errorMessage = document.getElementById("username-error");
        errorMessage.style.display = "none";
        document
          .getElementById("form1")
          .setAttribute("action", "php/login.php");
        document.getElementById("form1").submit();
        console.log("form submitted");
      }
    }
  };
}
