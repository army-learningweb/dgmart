export default function sliderProduct(){
    let index = 0;

    $(document).on('click','.btn-next',function(){
        let target = $(this).data('target');
        let item_width = $(`.${target}`).find('li:first').outerWidth();
        let item_per_slide = 5;
        let all_item = $(`.${target}`).find('li').length;
        
        index++;
        if(index > all_item - item_per_slide) index = 0;
        $(`.${target}`).css({
            'transform' : `translateX(-${index * item_width}px)`
        })
    })

    $(document).on('click','.btn-prev',function(){
        let target = $(this).data('target');
        let item_width = $(`.${target}`).find('li:first').outerWidth();
        let item_per_slide = 5;
         let all_item = $(`.${target}`).find('li').length;
         
        index--;
        if(index < 0) index = all_item - item_per_slide;
        $(`.${target}`).css({
            'transform' : `translateX(-${index * item_width}px)`
        })
    })
}