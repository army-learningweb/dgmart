export default function validation() {
    let timeout;
    $("input").on("input", function () {
        let field = $(this).attr("name");
        let value = $(this).val();
        let data = { [field]: value };

        timeout = clearTimeout(timeout);
        timeout = setTimeout(() => {
            $.ajax({
                type: "post",
                url: "/validation",
                data: data,
                dataType: "json",
                success: function (data) {
                    $("." + field + "_ajax_error").html(``);
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $("." + field + "_ajax_error").html(
                                `${errors[field][0]}`,
                            );
                            $("." + field + "_php_error").html(``);
                        }
                    }
                },
            });
        }, 350);
    });
}
