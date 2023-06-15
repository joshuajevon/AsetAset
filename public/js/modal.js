const deleteUser = (userId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/user/delete/" + userId;
    $("#modal").removeClass("hidden");
}

const deleteSeller = (sellerId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/seller/delete/" + sellerId;
    $("#modal").removeClass("hidden");
}

const deleteOwner = (ownerId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/owner/delete/" + ownerId;
    $("#modal").removeClass("hidden");
}

const deleteCarousel = (carouselId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/carousel/delete/" + carouselId;
    $("#modal").removeClass("hidden");
}

const deleteAsset = (assetId) => {
    var confirm = document.getElementById('confirmDelete');
    confirm.action = "/admin/assets/delete/" + assetId;
    $("#modal").removeClass("hidden");
}

const closeModal = () => {
    $("#modal").addClass("hidden");
}
