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

    $(document).on('click','.btn-next-banner',function(){
        index++;
        if(index >= slider_turn) index = 0;
        $('.slider-banner').css({
            'transform' : `translateX(-${index * slider_width}px)`
        })
    })

    $(document).on('click','.btn-prev-banner',function(){
        index--;
        if(index < 0) index = slider_turn - 1;
        $('.slider-banner').css({
            'transform' : `translateX(-${index * slider_width}px)`
        })
    })
}