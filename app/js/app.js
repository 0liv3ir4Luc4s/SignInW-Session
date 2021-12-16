const password_eye = document.getElementById("svg-password_eye");
const password_input = document.getElementById("password");

password_eye.addEventListener("click", (ev) => {
    if(password_eye.classList.contains("hide-password")) {
        password_eye.classList.remove("hide-password");
        password_input.type = "text";
    } else {
        password_eye.classList.add("hide-password");
        password_input.type = "password";
    }
})