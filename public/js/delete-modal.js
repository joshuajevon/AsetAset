const deleteUser = (userId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/user/delete/" + userId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const deleteSeller = (sellerId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/seller/delete/" + sellerId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const deleteOwner = (ownerId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/owner/delete/" + ownerId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const deleteCarousel = (carouselId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/carousel/delete/" + carouselId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const deleteAsset = (assetId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/assets/delete/" + assetId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const deleteAnnouncement = (announcementId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/announcement/delete/" + announcementId;
    $("#modal").removeClass("hidden");
    document.body.style.overflow = 'hidden';
}

const closeModal = () => {
    $("#modal").addClass("hidden");
    document.body.style.overflow = 'auto';
}
