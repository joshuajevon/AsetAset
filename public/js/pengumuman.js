function openModal(title, desc, date, file) {
    $("#modal-announcement").removeClass("hidden");
    document.body.style.overflow = "hidden";
    $("#announcement-date").html(date);
    $("#announcement-title").html(title);
    $("#announcement-desc").html(desc);
    $("#announcement-file").attr(
        "src",
        "{{ asset('/storage/asset/announcement/" + file
    );
}

function closeModal() {
    $("#modal-announcement").addClass("hidden");
    document.body.style.overflow = "auto";
}
