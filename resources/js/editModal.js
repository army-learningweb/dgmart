export default function editModal() {

    // User
    $(document).on("click", ".edit-user", function () {
        let modal_name = $(this).data("modal");
        let id = $(this).data("id");
        let data = { id: id };
        
        $.ajax({
            type: "get",
            url: "/admin/users/edit",
            data: data,
            dataType: "json",
            success: function (data) {
                $(".modal-" + modal_name)
                    .find("input[name=name]")
                    .val(data.name);
                $(".modal-" + modal_name)
                    .find("input[name=email]")
                    .val(data.email);
                $(".modal-" + modal_name)
                    .find("input[name=user_id]")
                    .val(data.id);
            },
        });
    });
}
