export default function updateStatus() {
    $(document).on("click", ".select-status", function () {
        let status_value = $(this).val();
        let id = $(this).data("id");
        let module = $(this).data("module");
        let data = { id: id, status_value: status_value };

        $.ajax({
            type: "post",
            url: `/admin/${module}/updateStatus`,
            data: data,
            dataType: "json",
            success: function (data) {
                $(".status-" + module + "-" + id).html(data);
            },
        });
    });
}
