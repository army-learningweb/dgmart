export default function productDetailTotal(){

    $('.next-variant').next('.variant_item').addClass('variant-active'); 

    let basePrice = 0;

    if($('.price-sale-off').length > 0){
        basePrice = Number($('.price-sale-off').data('price'));
    }else{
        basePrice = Number($('.base-price').data('price'));
    }

    $(document).on('click','.variant_item',function(){

        $(this).addClass('variant-active');
        $(this).nextUntil('.next-variant').removeClass('variant-active')
        $(this).prevUntil('.next-variant').removeClass('variant-active')
        
        let prices = $('.variant-active').map(function(){
            return $(this).data('price');
        }).get();
        
        let priceAccesories = 0;
        prices.forEach(element => {
            priceAccesories += Number(element);
        });
    
        $('.price-accesories').html(format(priceAccesories))
        $('.total-price').html(format(basePrice + priceAccesories))

        if($('input[name=price-accesories').length > 0){
            $('input[name=price-accesories').val(priceAccesories);
        }

        if($('input[name=total-price').length > 0){
            $('input[name=total-price').val(basePrice + priceAccesories);
        }
        
    });

    function format(price){
        return new Intl.NumberFormat('vi-VN').format(price) + 'đ';
    }
}