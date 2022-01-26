let username = document.querySelector("#username-field");
let email = document.querySelector("#email-field");
let password = document.querySelector("#password-field");
let repeatPassword = document.querySelector("#repeatPass-field");
let date = document.querySelector("#date-field");
let submitBtn = document.querySelector("#submit-btn");

let msg1 = document.querySelector(".msg1");
let msg2 = document.querySelector(".msg2");
let msg3 = document.querySelector(".msg3");
let msg4 = document.querySelector(".msg4");

const usernamePattern = /^[A-Za-z]{3,13}$/;
const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

let emailState = false;
let usernameState = false;
let passwordState = false;
let repasswordState = false;

username.addEventListener("keyup", usernameTracker);
function usernameTracker() {
  let usernameValue = username.value;
  if (usernameValue.match(usernamePattern)) {
    msg1.style.visibility = "hidden";
    usernameState = true;
  } else {
    msg1.style.visibility = "visible";
    msg1.style.color = "red";
    msg1.innerHTML = "Invalid username or its too short";
  }
}
email.addEventListener("keyup", emailTracker);
function emailTracker() {
  let emailValue = email.value;
  if (emailValue.match(emailRegex)) {
    msg2.style.visibility = "hidden";
    emailState = true;
  } else {
    msg2.style.visibility = "visible";
    msg2.style.color = "red";
    msg2.innerHTML = "Invalid email";
  }
}

password.addEventListener("keyup", passwordTracker);
function passwordTracker() {
  if (password.value.length >= 8) {
    msg3.style.visibility = "hidden";
    passwordState = true;
  } else {
    msg3.style.visibility = "visible";
    msg3.style.color = "red";
    msg3.innerHTML = "Password must be 8 or more";
  }
}

repeatPassword.addEventListener("keyup", repeatPassTracker);
function repeatPassTracker() {
  let repeatPassValue = repeatPassword.value;

  if (repeatPassValue !== password.value) {
    msg4.style.visibility = "visible";
    msg4.innerHTML = "Password doesn't match";
    msg4.style.color = "red";
  } else {
    msg4.style.visibility = "hidden";
    repasswordState = true;
  }
}

submitBtn.addEventListener("click", (e) => {
  if (!usernameState) {
    e.preventDefault();
    msg1.style.visibility = "visible";
    msg1.innerHTML = "Cannot be empty";
    msg1.style.color = "red";
  }
  if (!emailState) {
    e.preventDefault();
    msg2.style.visibility = "visible";
    msg2.innerHTML = "Cannot be empty";
    msg2.style.color = "red";
  }
  if (!passwordState) {
    e.preventDefault();
    msg3.style.visibility = "visible";
    msg3.innerHTML = "Cannot be empty";
    msg3.style.color = "red";
  }
  if (!repasswordState) {
    e.preventDefault();
    msg4.style.visibility = "visible";
    msg4.innerHTML = "Cannot be empty";
    msg4.style.color = "red";
  }
});
