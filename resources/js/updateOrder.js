export default function updateOrder() {
    $(document).on("change", ".change-order", function () {
        let order_value = $(this).val();
        let id = $(this).data("id");
        let data = { id: id, order_value: order_value };
        let module = $(this).data("module");
       
        setTimeout(() => {
            $.ajax({
                type: "post",
                url: `/admin/${module}/updateOrder`,
                data: data,
            });
        }, 300);
        
    });
}
