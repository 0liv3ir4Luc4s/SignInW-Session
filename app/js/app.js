const password_eye = document.getElementById("svg-password_eye");
const password_input = document.getElementById("password");

password_eye.addEventListener("click", (ev) => {
    if(password_input.type == "password") {
        password_eye.classList.add("show-password");
        password_input.type = "text";
    } else {
        password_eye.classList.remove("show-password");
        password_input.type = "password";
    }
})