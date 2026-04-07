export default function file() {
    $(document).on("change", ".upload-file", function () {

        let file = this.files[0];
        let type = $(this).data('type');
        let name = $(this).data('name');
        let is_main = $(this).data('main') ? $(this).data('main') : "0";
        let data = new FormData;
        data.append('file',file);
        data.append('type',type);
        data.append('name',name);
        data.append('is_main',is_main);
        
        $.ajax({
            type: "post",
            url: "/admin/file/upload",
            contentType:false,
            processData:false,
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.remove-file[data-name=${name}]`).removeClass('hidden')
                $(`.${name}-img`).attr('src',data.url).removeClass('hidden');
                $(`.remove-${name}-img`).removeClass('hidden');
                $(`input[name=${name}-id]`).val(data.id);
                $(`input[name=old-${name}-id]`).val(data.id);
                $(`.old-${name}-id_php_error`).html('');
            },
            error: function(xhr){
               
            }
        });
    });

    $(document).on("click",".remove-file",function(){
        let name = $(this).data('name')
        let type = $(this).data('type')
        let id = $(`input[name=${name}-id]`).val()
        let data = {id:id,name:name,type:type}
        
        $(`.${name}-img`).attr('src','').addClass('hidden');
        $(`input[name=${name}-id]`).val('')
        $(this).addClass('hidden')

        $.ajax({
            type: "post",
            url: "/admin/file/remove",
            data: data,
            dataType: "json"
        });
    });

    $(document).on("click",".fake-remove-file",function(){
        let name = $(this).data('name')  
        $(`.${name}-img`).attr('src','').addClass('hidden');
        $(`input[name=old-${name}-id]`).val('')
        $(this).addClass('hidden')
    });
}
