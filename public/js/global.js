function togglePassword () {
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePassword.textContent = "visibility_off";
    } else {
        passwordInput.type = "password";
        togglePassword.textContent = "visibility";
    }
}

function deleteConfirm(link) {
    const background = document.getElementById("modalBackground");
    const modal = document.getElementById("modal");
    const deleteLink = document.getElementById("deleteLink");

    if (background.classList.contains("hidden")) {
        background.classList.remove("hidden");
    } else {
        background.classList.add("hidden");
    }

    if (modal.classList.contains("hidden")) {
        modal.classList.remove("hidden");
        deleteLink.href = link;
    } else {
        modal.classList.add("hidden");
    }
}

function checkFile() {
    var input = document.getElementById("profile");
    var file = input.files[0];
    var maxSize = 1024 * 1024;

    if (file) {
        if (file.type.startsWith("image/")) {
            document.getElementById("fileTypeError").style.display = "none";
        } else {
            document.getElementById("fileTypeError").style.display = "block";
            input.value = null;
        }

        if (file.size <= maxSize) {
            document.getElementById("fileSizeError").style.display = "none";
        } else {
            document.getElementById("fileSizeError").style.display = "block";
            input.value = null;
        }
    }
}