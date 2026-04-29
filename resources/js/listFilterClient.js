export default function listFilterClinet() {
    // Sản phẩm
    $(document).on(
        "input",
        ".client-search-product, .category-product-filter, .order-price-product, .type-product-filter",
        function () {
            let search_value = $(".client-search-product").val();
            let category_value = $(".category-product-filter:checked").val();
            let order_value = $(".order-price-product:checked").val();
            let type_value = $(".type-product-filter:checked").val();
            let data = {
                search_value: search_value,
                category_value: category_value,
                order_value: order_value,
                type_value: type_value,
            };
            ajaxAction(data);
        },
    );

    // Phân trang sản phẩm
    $(document).on("click", "a[module='client-list-products']", function (e) {
        e.preventDefault();
        let search_value = $(".client-search-product").val();
        let category_value = $(".category-product-filter:checked").val();
        let order_value = $(".order-price-product:checked").val();
        let type_value = $(".type-product-filter:checked").val();
        let data = {
            search_value: search_value,
            category_value: category_value,
            order_value: order_value,
            type_value: type_value,
        };
        let url = $(this).attr("href");
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.client-list-products`).html(data.view);
                if (data.view_type) {
                    $(`.type-products`).html(data.view_type);
                } else {
                    $(`.type-products`).html("");
                }
                window.scrollTo({ top: 130, behavior: "smooth" });
            },
        });
    });

    function ajaxAction(data) {
        $.ajax({
            type: "post",
            url: "/san-pham",
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.client-list-products`).html(data.view);
                if (data.view_type) {
                    $(`.type-products`).html(data.view_type);
                } else {
                    $(`.type-products`).html("");
                }
                window.scrollTo({ top: 130, behavior: "smooth" });
            },
        });
    }

    // Bài viết
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
        let id = $(".post-category-item")
            .filter(".post-category-active")
            .data("category-id");
        let data = { id: id };
        let url = $(this).attr("href");
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data.view);
                $(".client-list-posts").html(data.view);
                window.scrollTo({
                    top: 350,
                    behavior: "smooth",
                });
            },
        });
    });
}
