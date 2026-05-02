export default function listFilterClinet() {

    // Sản phẩm
    $(".product-category-item, .product-order-item").on("click", function () {

        if($(this).hasClass('product-category-item')){
            $('.product-category-item').removeClass('category-active');
        }
        if($(this).hasClass('product-order-item')){
            $('.product-order-item').removeClass('category-active');
        }
        $(this).addClass('category-active');
        
        let category_id = $('.product-category-item').filter('.category-active').data("category-id");
        let order_value = $('.product-order-item').filter('.category-active').data("order");
        let url = $(this).data("url");
        let data = { 
            category_id: category_id,
            order_value: order_value 
        };
        saveURL(data);
        $.ajax({
            type: "post",
            url: `/${url}`,
            data: data,
            dataType: "json",
            success: (data) => {
                $(".client-list-products").html(data.view);
            },
        });
    });

    // Phân trang sản phẩm
    $(document).on("click", "a[module='client-list-products']", function (e) {
        e.preventDefault();

        let container_height_value = $(".client-list-products").height();

        let category_id = $('.product-category-item').filter('.category-active').data("category-id");
        let order_value = $('.product-order-item').filter('.category-active').data("order");
        let url = $(this).attr('href');
        let data = { 
            category_id: category_id,
            order_value: order_value,
            url:url
        };
        saveURL(data);

        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: (data) => {

                $(".client-list-products").addClass(`min-h-${container_height_value}`);
                $(".client-list-products").html(data.view);

                window.scrollTo({
                    behavior:"smooth",
                    top: 116
                })

                setTimeout(() => {
                    $(".client-list-products").removeClass(`min-h-${container_height_value}`);
                }, 350);
            },
        });

    });

    // Xử lý URL
    function saveURL(data){
        const params = new URLSearchParams();
        if(data.category_id) params.set('category',data.category_id);
        if(data.order_value) params.set('order',data.order_value);
        if(data.url){
            const urlObj = new URL (data.url);
            params.set('page',urlObj.searchParams.get('page'));
        }
        let newURL;
        if(params == ''){
            newURL = `${window.location.pathname}`
        }else{
            newURL = `${window.location.pathname}?${params.toString()}`    
        }
        window.history.pushState({},'',newURL);
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
                $("li.post-category-item").removeClass("category-active");
                $(this).addClass("category-active");
                $(".client-list-posts").html(data.view);
            },
        });
    });

    // Phân trang bài viết
    $(document).on("click", "a[module='client-list-posts']", function (e) {
        e.preventDefault();
        let id = $(".category-item")
            .filter(".category-active")
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
