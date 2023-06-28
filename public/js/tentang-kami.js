if (document.querySelector("#bottom-splide")) {
    let carouselItem = $(".splide__item");
    if (carouselItem.length == 1) {
        var bottomSplide = new Splide("#bottom-splide", {
            drag: false,
            arrows: false,
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
    } else {
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

    carouselItem.each(function () {
        let itemHref = $(this).attr("href");
        if (itemHref == "") {
            $(this).removeClass("hover:opacity-80");
            $(this).addClass("pointer-events-none");
        }
    });
}
