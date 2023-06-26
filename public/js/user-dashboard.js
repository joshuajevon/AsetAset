function toggleOldPassword() {
    inputCurrentPassword = document.querySelector("#current_password");
    eye = document.querySelector("#eye-1");
    eyeSlash = document.querySelector("#eye-slash-1");
    if (inputCurrentPassword.type === "password") {
        inputCurrentPassword.type = "text";
        eyeSlash.classList.add("hidden");
        eye.classList.remove("hidden");
    } else {
        inputCurrentPassword.type = "password";
        eye.classList.add("hidden");
        eyeSlash.classList.remove("hidden");
    }
}

function toggleNewPassword() {
    inputNewPassword = document.querySelector("#password");
    eye = document.querySelector("#eye-2");
    eyeSlash = document.querySelector("#eye-slash-2");
    if (inputNewPassword.type === "password") {
        inputNewPassword.type = "text";
        eyeSlash.classList.add("hidden");
        eye.classList.remove("hidden");
    } else {
        inputNewPassword.type = "password";
        eye.classList.add("hidden");
        eyeSlash.classList.remove("hidden");
    }
}

function toggleConfirmNewPassword() {
    inputNewPassword = document.querySelector("#password_confirmation");
    eye = document.querySelector("#eye-3");
    eyeSlash = document.querySelector("#eye-slash-3");
    if (inputNewPassword.type === "password") {
        inputNewPassword.type = "text";
        eyeSlash.classList.add("hidden");
        eye.classList.remove("hidden");
    } else {
        inputNewPassword.type = "password";
        eye.classList.add("hidden");
        eyeSlash.classList.remove("hidden");
    }
}

function closeProfileModal() {
    $("#profile-modal").fadeOut(200);
}

function closePasswordModal() {
    $("#password-modal").fadeOut(200);
}
