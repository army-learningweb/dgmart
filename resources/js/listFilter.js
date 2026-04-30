export default function listFilter() {
    let timeout;
    // lọc danh sách
    $(document).on(
        "input",
        ".select-filter, .search, .select-category, .select-order",
        function () {
            let module = $(this).data("module");
            let search_value = $(".search").val();
            let filter_value = $(".select-filter").val();
            let category_value = $(".select-category").val();
            let order_value = $(".select-order").val();
            let data = {
                search_value: search_value,
                filter_value: filter_value,
                category_value: category_value,
                order_value: order_value,
            };
            saveUrl(data);

            if (search_value != "") {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    $.ajax({
                        type: "post",
                        url: `/admin/${module}`,
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            $(".list-" + module).html(data);
                        },
                    });
                }, 350);
            }else{
                $.ajax({
                        type: "post",
                        url: `/admin/${module}`,
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            $(".list-" + module).html(data);
                        },
                    });
            }
        },
    );

    // phân trang
    $(document).on(
        "click",
        "a[module=products], a[module=posts]",
        function (e) {
            e.preventDefault();
            let url = $(this).attr("href");
            let module = $(this).attr("module");
            let search_value = $(".search").val();
            let filter_value = $(".select-filter").val();
            let category_value = $(".select-category").val();
            let order_value = $(".select-order").val();
            let data = {
                search_value: search_value,
                filter_value: filter_value,
                category_value: category_value,
                order_value: order_value,
                url: url,
            };
            saveUrl(data);

            $.ajax({
                type: "post",
                url: url,
                data: data,
                dataType: "json",
                success: function (data) {
                    $(".list-" + module).html(data);
                },
            });
        },
    );

    // Xử lí URL
    function saveUrl(data) {
        const params = new URLSearchParams();

        if (data.search_value) params.set("search", data.search_value);
        if (data.order_value) params.set("order", data.order_value);
        if (data.category_value) params.set("category", data.category_value);
        if (data.filter_value) params.set("filter", data.filter_value);
        if (data.url) {
            const urlObj = new URL(data.url);
            params.set("page", urlObj.searchParams.get("page"));
        }

        let newUrl;
        if (params == "") {
            newUrl = `${window.location.pathname}`;
        } else {
            newUrl = `${window.location.pathname}?${params.toString()}`;
        }

        window.history.pushState({}, "", newUrl);
    }
}
