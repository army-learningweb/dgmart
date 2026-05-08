export default function attribute(){
    $(document).on('change','select[name=attribute]',function(){
        let attribute_value = $(this).val();
        let data = {attribute_value:attribute_value}

        $.ajax({
            type: "get",
            url: "/admin/products/getAtributeVariant",
            data: data,
            dataType: "json",
            success: function (data) {
                $('.attribute_variant_check').html(data.view)
            }
        });
    })
}