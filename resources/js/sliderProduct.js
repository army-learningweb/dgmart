export default function sliderProduct(){

    $(document).on('click','.btn-next',function(){
        let target = $(this).data('target');
        let index = $(this).parents('.box-btn').next('.slider-product').find(`.${target}`).data('index');
        let item_width = $(`.${target}`).find('li:first').outerWidth();
        let item_per_slide = 5;
        let all_item = $(`.${target}`).find('li').length;
        
        index++;
        if(index > all_item - item_per_slide) index = 0;
        $(this).parents('.box-btn').next('.slider-product').find(`.${target}`).data('index',index);
       
        $(`.${target}`).css({
            'transform' : `translateX(-${index * item_width}px)`
        })
    })

    $(document).on('click','.btn-prev',function(){
        let target = $(this).data('target');
        let index = $(this).parents('.box-btn').next('.slider-product').find(`.${target}`).data('index');
        let item_width = $(`.${target}`).find('li:first').outerWidth();
        let item_per_slide = 5;
        let all_item = $(`.${target}`).find('li').length;
         
        index--;
        if(index < 0) index = all_item - item_per_slide;
        $(this).parents('.box-btn').next('.slider-product').find(`.${target}`).data('index',index);

        $(`.${target}`).css({
            'transform' : `translateX(-${index * item_width}px)`
        })
    })
}