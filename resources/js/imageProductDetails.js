export default function imageProductDetails() {
    let img_width = $(".image-detail").width();
    let index = 0;
    let num_img = $(".image-detail").length;
    $(`.dot-item:eq(0)`).addClass('!bg-black');
    
    $(".btn-next-img").on("click", function () {
        index++;
        if(index >= num_img) index = 0;
        $('.container-image').css({
            transform: `translateX(-${index * img_width}px)`
        })
        $(`.dot-item:eq(${index})`).addClass('!bg-black');
        $(`.dot-item:eq(${index})`).prev().removeClass('!bg-black');
        $(`.dot-item:eq(${index})`).next().removeClass('!bg-black');
        if(index == 0){
            $(`.dot-item:eq(3)`).removeClass('!bg-black');
        }
    });

    $(".btn-prev-img").on("click", function () {
        index--;
        if(index < 0) index = num_img - 1;
        $('.container-image').css({
            transform: `translateX(-${index * img_width}px)`
        })
        $(`.dot-item:eq(${index})`).addClass('!bg-black');
        $(`.dot-item:eq(${index})`).next().removeClass('!bg-black');
        $(`.dot-item:eq(${index})`).prev().removeClass('!bg-black');
        if(index == 3){
            $(`.dot-item:eq(0)`).removeClass('!bg-black');
        }
    });
}
