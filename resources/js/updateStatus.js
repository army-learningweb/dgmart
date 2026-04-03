export default function updateStatus() {
    $(document).on("change", ".select-status", function () {
        let status_value = $(this).val();
        let id = $(this).data("id");
        let module = $(this).data("module");
        let data = { id: id, status_value: status_value };
        let type = $(this).data("type") ?? '';
        
        // Xử lí cho danh mục sản phẩm, bài viết
        let url = ''
        if(type == 'categories'){
            url = `/admin/${module}/${type}/updateStatus`
        }else{
            url = `/admin/${module}/updateStatus`
        }
        
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {
               
                /// Xử lí cho danh mục sản phẩm, bài viết
                if(type == 'categories'){
                    $(".status-categories-" + module + "-" + id).html(data.view);
                }else{
                    $(".status-" + module + "-" + id).html(data.view);
                }
                
                // Truyền data vào statis
                if(data.active != 'undefined'){
                    $('.active-'+ module).html('(' + data.active + ')');
                }

                if(data.unactive != 'undefined'){
                    $('.unactive-'+ module).html('(' + data.unactive + ')');
                }

                if(data.publish != 'undefined'){
                    $('.publish-'+ module).html('(' + data.publish + ')');
                }

                if(data.unpublish != 'undefined'){
                    $('.unpublish-'+ module).html('(' + data.unpublish + ')');
                }

                if(data.draft != 'undefined'){
                    $('.draft-'+ module).html('(' + data.draft + ')');
                }

            },
        });
    });
}
