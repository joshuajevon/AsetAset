window.addEventListener("load", function () {
    setTimeout(function () {
        let inputFields = document.querySelectorAll("input");

        for (let i = 0; i < inputFields.length; i++) {
            inputFields[i].value = "";
        }
    }, 800); // Delay in milliseconds (adjust if needed)
});
