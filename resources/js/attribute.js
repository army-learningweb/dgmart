export default function attribute(){
    $(document).on('change','select[name=attribute]',function(){
        let attribute_value = $(this).val();
        let type = $(this).attr('type');
        let data = {attribute_value:attribute_value}
        console.log(type);
        $.ajax({
            type: "get",
            url: "/admin/products/getAtributeVariant",
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.${type}_attribute_variant_check`).html(data.view)
            }
        });
    })
}