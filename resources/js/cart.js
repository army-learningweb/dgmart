export default function cart(){
    let timeout;
    $(document).on('change','.cart-increase-qty',function(){
        let qty = $(this).val();
        let rowId = $(this).data('row-id');
        let data = {qty:qty,rowId:rowId}
        
        clearTimeout(timeout);
        timeout = setTimeout(() => {
                $.ajax({
                type: "post",
                url: "/gio-hang/update",
                data: data,
                dataType: "json",
                success: function (data) {
                    $(`.price[data-row-id=${data.rowId}]`).html(data.price);
                    $('.total-price').html(data.total_price + "đ");
                    $('.cart-qty').html("x" + data.cart_count);
                    $('.cart-icon-qty').html(data.cart_count);
                }
            });
        }, 300);
        
    })
}