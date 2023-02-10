const loginForm = document.querySelector("#login-form");
loginForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const username = document.querySelector("#username").value;
  const password = document.querySelector("#password").value;
  console.log(`Username: ${username} Password: ${password}`);
});
