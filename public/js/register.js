window.addEventListener("load", function () {
    setTimeout(function () {
        var inputFields = document.querySelectorAll("input");

        for (var i = 0; i < inputFields.length; i++) {
            inputFields[i].value = "";
        }
    }, 400); // Delay in milliseconds (adjust if needed)
});
