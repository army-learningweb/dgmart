export default function file() {
    $(document).on("change", ".upload-file", function () {
        let file = this.files[0];
        let type = $(this).data('type');
        let name = $(this).data('name');
        
        let data = new FormData;
        data.append('file',file);
        data.append('type',type);
        data.append('name',name);
       
        $.ajax({
            type: "post",
            url: "/admin/file/upload",
            contentType:false,
            processData:false,
            data: data,
            dataType: "json",
            success: function (data) {
                $(`.${name}-img`).attr('src',data.url).removeClass('hidden');
                $(`.remove-${name}-img`).removeClass('hidden');
                $(`input[name=${name}-id]`).val(data.id);
                $(`.remove-file[data-name=${name}]`).removeClass('hidden')
            },
            error: function(xhr){
               
            }
        });
    });

    $(document).on("click",".remove-file",function(){
        let name = $(this).data('name')
        let id = $(`input[name=${name}-id]`).val()
        let data = {id:id,name:name}
        
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
