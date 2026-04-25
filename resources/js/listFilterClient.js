export default function listFilterClinet() {
    $(".client-search-product, .category-product-filter, .order-price-product").on(
        "input",
        function () {
            let search_value = $('.client-search-product').val();
            let category_value = $('.category-product-filter:checked').val();
            let order_value = $('.order-price-product:checked').val();
            let data = {
                search_value: search_value,
                category_value: category_value,
                order_value:order_value
            };
            ajaxAction(data);
        },
    );

    function ajaxAction(data) {
        $.ajax({
            type: "post",
            url: "/san-pham",
            data: data,
            dataType: "json",
            success: function (data) {
                window.scrollTo({top:135, behavior:"smooth"})
                $(`.client-list-products`).html(data.view);
                if(data.view_type){
                    $(`.type-products`).html(data.view_type);
                }else{
                    $(`.type-products`).html('');
                }
                
            },
        });
    }

    // Bài viết theo danh mục
    $(".post-category-item").on("click", function () {
        let id = $(this).data("category-id");
        let data = { id: id };
        $.ajax({
            type: "post",
            url: "/bai-viet",
            data: data,
            dataType: "json",
            success: (data) => {
                $("li.post-category-item").removeClass("post-category-active");
                $(this).addClass("post-category-active");
                $(".client-list-posts").html(data.view);
            },
        });
    });

    // Phân trang bài viết
    $(document).on("click", "a[module='client-list-posts']", function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        let module = $(this).attr("module");
        let data;

        if (module == "client-list-products") {
            let filter_value = $(".category-filter:checked").val();
            let order_value = $(".order-filter:checked").val();
            data = { filter_value: filter_value, order_value: order_value };
        }

        if (module == "client-list-posts") {
            let id = $(".post-category-item")
                .filter(".post-category-active")
                .data("category-id");
            data = { id: id };
        }

        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.${module}`).html(data.view);

                if (module == "client-list-products") {
                    window.scrollTo({
                        top: 80,
                        behavior: "smooth",
                    });
                }

                if (module == "client-list-posts") {
                    window.scrollTo({
                        top: 350,
                        behavior: "smooth",
                    });
                }
            },
        });
    });
}
