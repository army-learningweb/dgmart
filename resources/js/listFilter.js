export default function listFilter(){

    // status
    $('.select-filter').on('input',function(){
        let module = $(this).data('module');
        let filter_value = $(this).val()
        let data = {filter_value:filter_value}
        ajaxAction(module,data)
    })

    // search
    $('.search').on('input',function(){
        let module = $(this).data('module');
        let search_value = $(this).val();
        let data = {search_value:search_value}
        ajaxAction(module,data)
    })

    function ajaxAction(module,data){
        $.ajax({
            type: "get",
            url: `/admin/${module}/filter`,
            data: data,
            dataType: "json",
            success: function (data) {
                $('.list-'+module).html(data)
            }
        });
    }
}