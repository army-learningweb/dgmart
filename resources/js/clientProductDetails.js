export default function clientProductDetails(){
    $(window).scroll(function () { 
        let scroll_value = $(this).scrollTop();
        if(scroll_value > 150){
            $('.client-product-name').addClass('ms-20');
        }else{
            $('.client-product-name').removeClass('ms-20');
        }
    });
}