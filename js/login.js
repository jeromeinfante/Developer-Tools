let loginBtn = document.getElementById("login-btn");
let registerBtn = document.getElementById("register-btn");
let login = document.getElementById("login");
let register = document.getElementById("register");
let btn = document.getElementById("btn");

registerBtn.addEventListener("click", () => {
    login.style.left = "-400px";
    register.style.left = "50px";
    btn.style.left = "110px";
});

loginBtn.addEventListener("click", () => {
    login.style.left = "50px";
    register.style.left = "450px";
    btn.style.left = "0";
});
