export default function editModal() {
    // User
    $(document).on("click", ".open-modal-edit", function () {
        let modal_name = $(this).data("modal");
        let module = $(this).data("module");
        let id = $(this).data("id");
        let data = { id: id };
        let type = $(this).data("type") ?? '';
    
        let url = ''
        if(type == 'categories'){
            url = `/admin/${module}/${type}/edit`
        }else{
            url = `/admin/${module}/edit`
        }
        
        $.ajax({
            type: "get",
            url: url,
            data: data,
            dataType: "json",
            success: function (data) {

                const modal = $(".modal-" + modal_name);
                const inputs = {
                    name: modal.find("input[name=name]"),
                    email: modal.find("input[name=email]"),
                    slug: modal.find("input[name=slug]"),
                    id : modal.find("input[name=id]"),
                    textarea_desc : modal.find("textarea[name=desc]"),
                }
                
                // categories
                if ((module == 'posts' || module == 'products') && type == 'categories'){
                    inputs.name.val(data.name)
                    inputs.slug.val(data.slug)
                    inputs.id.val(data.id)    
                    modal.find(`option[value=${data.parent_id}]`).prop('selected',true)
                    modal.find('.select-box').toggleClass('hidden',data.parent_id == 0)
                    modal.find('input[name=is_parent]').val(data.parent_id)
                }        
                
                // user module
                if (module == "users") {
                    inputs.name.val(data.name)
                    inputs.email.val(data.email)
                    inputs.id.val(data.id)
                }

                // permission module
                if (module == 'permissions'){
                    inputs.name.val(data.name)
                    inputs.slug.val(data.slug)
                    inputs.textarea_desc.val(data.desc)
                    inputs.id.val(data.id)
                }

                // role module
                if (module == 'roles'){
                    inputs.name.val(data.role.name)
                    inputs.textarea_desc.val(data.role.desc)
                    inputs.id.val(data.role.id)
                    data.permissions.forEach(permission_id => {
                        modal.find(`input[value=${permission_id}]`).prop('checked',true);
                    });
                }
            },
        });
    });
}
