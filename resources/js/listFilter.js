export default function listFilter() {
    // lọc danh sách
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

        // 1. Cập nhật URL để "ghi nhớ" ngữ cảnh
        
        $.ajax({
            type: "post",
            url: `/admin/${module}`,
            data: data,
            dataType: "json",
            success: function (data) {
                $(".list-" + module).html(data);
            },
        });
    })

    // phân trang
    $(document).on("click","nav[role=navigation] a",function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let module = $(this).attr('module');

        let search_value = $('.search').val();
        let filter_value = $('.select-filter').val();
        let category_value = $('.select-category').val();

        let data = { 
            search_value: search_value,
            filter_value: filter_value,
            category_value: category_value,
            url : url
        };

        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
                $(".list-" + module).html(data);
            },
        });
    })
}
