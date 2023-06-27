if (document.querySelector("#bottom-splide")) {
    var bottomSplide = new Splide("#bottom-splide", {
        autoplay: true,
        interval: 3500,
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
    bottomSplide.mount();
}
