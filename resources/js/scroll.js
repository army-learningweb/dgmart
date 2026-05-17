export default function backScroll(){

    let backScroll = localStorage.getItem('scroll_value');
    $('.table-scroll').scrollTop(backScroll);
    $('.table-scroll').on('mouseenter', function () {
        $(this).scroll(function () { 
            let scrollValue = $(this).scrollTop();
            localStorage.setItem('scroll_value',scrollValue);
        });
    });

    $(window).scroll(function () { 
        let window_scroll = $(window).scrollTop();
        localStorage.setItem('window_scroll',window_scroll);
    });
    $(window).scrollTop(localStorage.getItem('window_scroll'));

    $(document).on('click','a, button:not(.send-reviews)',function(){
        localStorage.clear();
    })
}