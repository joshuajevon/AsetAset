var topSplide = new Splide("#top-splide", {
    autoplay: true,
    drag: true,
    type: "loop",
    height: "400px",
    breakpoints: {
        640: {
            height: "200px",
        },
        768: {
            height: "250px",
        },
        1024: {
            height: "300px",
        },
        1280: {
            height: "350px",
        },
        1536: {
            height: "400px",
        },
    },
});
topSplide.mount();


function openFilter(){
    document.querySelector("#dialog-filter").showModal();
}
