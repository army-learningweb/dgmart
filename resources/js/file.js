export default function file() {
    $(document).on("change", ".upload-file", function () {
        let file = this.files[0];
        let type = $(this).data('type');
        let name = $(this).attr('name')

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
                $(`img.${name}`).attr('src',data.url).removeClass('hidden');
                $(`input[name=${name}_id`).val(data.id);
                $(`.remove_${name}`).attr('data-id',data.id).removeClass('hidden');
            },
            error: function(xhr){
                if(xhr.status === 422){
                    let errors = xhr.responseJSON.errors

                    if (errors && errors[name]){
                        $(`.${name}_ajax_error`).html(errors[name][0])
                    }
                }
            }
        });
    });

    $(document).on("click",".remove-file",function(){
        let id = $(this).data('id')
        let name = $(this).data('name')
        let data = {id:id,name:name}
        
        $(`img.${name}`).attr('src','').addClass('hidden');
        $(`input[name=${name}_id`).val('');
        $(this).attr('data-id','').addClass('hidden');

        $.ajax({
            type: "post",
            url: "/admin/file/remove",
            data: data,
            dataType: "json",
            success: function (data) {
                
            }
        });
    })
}
