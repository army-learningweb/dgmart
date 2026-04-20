export default function listFilterClinet(){
    // bộ lọc
    $('.category-filter, .order-filter').on('change',function(){
        let filter_value = $('.category-filter:checked').val();
        let order_value = $('.order-filter:checked').val();
        let parent_category = $(this).data('parent');

        let data = {filter_value:filter_value,order_value:order_value,parent_category}
        let url = $(this).data('url');
        $.ajax({
            type: "post",
            url: "/".url,
            data: data,
            dataType: "json",
            success: function (data) {
               $('.client-list-products').html(data);

               if(filter_value != 'all' || order_value != 'base'){
                    $('.reset-filter').removeClass('hidden');
               }else{
                    $('.reset-filter').addClass('hidden');
               }
               
               window.scrollTo({
                    top:80,
                    behavior:"smooth"
               });
            }
        });
    })

    // Phân trang
    $(document).on("click","a[module='client-products']",function(e){
        e.preventDefault();
        let filter_value = $('.category-filter:checked').val();
        let order_value = $('.order-filter:checked').val();
        let data = {filter_value:filter_value,order_value:order_value}
        let url = $(this).attr('href');
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
               $('.client-list-products').html(data);
               window.scrollTo({
                    top:80,
                    behavior:"smooth"
               });
            }
        });
    })
}