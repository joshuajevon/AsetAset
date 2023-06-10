function openFilter(){
    $("#dialog-filter").removeClass('hidden');
    document.body.style.overflow = 'hidden';
}

function closeFilter(){
    $("#dialog-filter").addClass('hidden');
    document.body.style.overflow = 'auto';
}
