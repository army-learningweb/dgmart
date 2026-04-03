export default function listFilter() {
    // status
    $(document).on("input",".select-filter, .search, .select-category",function(){
        let module = $(this).data("module");
        let search_value = $('.search').val();
        let filter_value = $('.select-filter').val();
        let category_value = $('.select-category').val();

        let data = { 
            search_value: search_value,
            filter_value: filter_value,
            category_value: category_value
        };

        $.ajax({
            type: "get",
            url: `/admin/${module}/filter`,
            data: data,
            dataType: "json",
            success: function (data) {
                $(".list-" + module).html(data);
            },
        });
    })
}
