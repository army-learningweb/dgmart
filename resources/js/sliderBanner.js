export default function sliderBanner() {
    let url = window.location.href;
    let slider_width = $(".slider-banner").innerWidth();
    let slider_turn = $(".slider-item").length;
    let index = 0;
    if (url == "http://dgmart.test/") {
        setInterval(() => {
            index++;
            if (index >= slider_turn) index = 0;
            $(".slider-banner").css({
                transform: `translateX(-${index * slider_width}px)`,
            });
        }, 5000);
    }
}