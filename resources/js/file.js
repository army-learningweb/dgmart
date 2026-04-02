export default function file() {
    $(document).on("change", ".upload-file", function () {
        let file = this.files[0];
        let type = $(this).data('type');
        
        console.log(file);
        let data = new FormData;
        data.append('file',file);
        data.append('type',type);
       
        $.ajax({
            type: "post",
            url: "/admin/file/upload",
            contentType:false,
            processData:false,
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            },
            error: function(xhr){
               
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
