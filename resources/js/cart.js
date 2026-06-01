export default function cart() {
    let timeout;
    $(document).on("click", ".cart-change-qty", function () {
        let action = $(this).attr("action");
        const rowId = $(this).data("row-id");
        const stock = $(this).data("stock");
        let qty = $(`.item-${rowId}`).data("qty");
        action == "increase" ? qty++ : qty--;

        if (qty > stock) return alert("Vượt quá số lượng hàng kho");
        let data = { qty: qty, rowId: rowId };
        if (qty < 1) {
            if (!confirm("Bạn có chắc muốn xóa sản phẩm khỏi giỏ hàng")) {
                return;
            }
        }
        $.ajax({
            type: "post",
            url: "/gio-hang/update",
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.cart-wrapper`).html(data.view);
                $(".cart-icon-qty").html(data.cart_count);
            },
        });
    });
}
