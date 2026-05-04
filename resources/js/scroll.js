export default function backScroll(){

    let backScroll = localStorage.getItem('scroll_value');
    $('.table-scroll').scrollTop(backScroll);

    $('.table-scroll').on('mouseenter', function () {
        $(this).scroll(function () { 
            let scrollValue = $(this).scrollTop();
            localStorage.setItem('scroll_value',scrollValue);
        });
    });
}