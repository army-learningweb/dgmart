export default function listFilter(){
    $('.select-filter').on('change',function(){
        let module = $(this).data('module');
        let filter_value = $(this).val()
        let data = {filter_value:filter_value}

        $.ajax({
            type: "get",
            url: `/admin/${module}/filter`,
            data: data,
            dataType: "json",
            success: function (data) {
                $('.list-'+module).html(data)
            }
        });
    })
}