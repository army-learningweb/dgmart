export default function editModal() {
    // User
    $(document).on("click", ".open-modal-edit", function () {
        let modal_name = $(this).data("modal");
        let module = $(this).data("module");
        let id = $(this).data("id");
        let data = { id: id };

        $.ajax({
            type: "get",
            url: `/admin/${module}/edit`,
            data: data,
            dataType: "json",
            success: function (data) {
               
                // user module
                if (module == "users") {
                    $(".modal-" + modal_name).find("input[name=name]").val(data.name)
                    $(".modal-" + modal_name).find("input[name=email]").val(data.email)
                    $(".modal-" + modal_name).find("input[name=user_id]").val(data.id)
                }

                // permission module
                if (module == 'permissions'){
                    $(".modal-" + modal_name).find("input[name=name]").val(data.name)
                    $(".modal-" + modal_name).find("input[name=slug]").val(data.slug)
                    $(".modal-" + modal_name).find("textarea[name=desc]").val(data.desc)
                    $(".modal-" + modal_name).find("input[name=permission_id]").val(data.id)
                }

                // role module
                if (module == 'roles'){
                    $(".modal-" + modal_name).find("input[name=name]").val(data.role.name)
                    $(".modal-" + modal_name).find("textarea[name=desc]").val(data.role.desc)
                    $(".modal-" + modal_name).find("input[name=role_id]").val(data.role.id)
                    data.permissions.forEach(permission_id => {
                        $(".modal-" + modal_name).find(`input[value=${permission_id}]`).prop('checked',true);
                    });
                }
            },
        });
    });
}
