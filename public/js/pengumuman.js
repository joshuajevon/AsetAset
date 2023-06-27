function openModal(title, desc, date, file) {
    $("#modal-announcement").removeClass("hidden");
    document.body.style.overflow = "hidden";
    $("#announcement-date").html(date);
    $("#announcement-title").html(title);
    $("#announcement-desc").html(desc);
    $("#announcement-download").attr(
        "href",
        "storage/asset/announcement/" + file
    );

    const fileExtension = file.toLowerCase();

    if (
        fileExtension.endsWith(".jpg") ||
        fileExtension.endsWith(".jpeg") ||
        fileExtension.endsWith(".png") ||
        fileExtension.endsWith(".gif") ||
        fileExtension.endsWith(".svg") ||
        fileExtension.endsWith(".webp") ||
        fileExtension.endsWith(".bmp")
    ) {
        const imgElement = $("<img>", {
            id: "announcement-image",
            alt: "announcement-image",
            src: "storage/asset/announcement/" + file,
        });

        imgElement.insertBefore($("#announcement-download"));
    }
}

function closeModal() {
    $("#modal-announcement").addClass("hidden");
    document.body.style.overflow = "auto";

    $("#announcement-date").html("");
    $("#announcement-title").html("");
    $("#announcement-desc").html("");
    $("#announcement-download").attr("href", "");
    $("#announcement-image").remove();
}
