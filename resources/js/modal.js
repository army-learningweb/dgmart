export default function modal() {
    // ============NORMAL MODAL=======================
    // open
    $(document).on("click", ".open-modal", function () {
        let modal_name = $(this).data("modal");
        $(".modal-" + modal_name).removeClass(
            "pointer-events-none opacity-0 scale-0",
        );
        $(".modal-" + modal_name + "-is-open").addClass(
            "animate_translate_down",
        );
        $(".modal-" + modal_name)
            .find("img")
            .attr("src", "")
            .addClass("hidden");
        $(".modal-" + modal_name)
            .find(".remove-file")
            .attr("src", "")
            .addClass("hidden");
        $(".modal-" + modal_name)
            .find(".fake-remove-file")
            .attr("src", "")
            .addClass("hidden");
    });

    // close
    $(document).on("click", ".cancel-modal", function () {
        let modal_name = $(this).data("modal");
        const modal = $(".modal-" + modal_name);
        $(".modal-element").each(function () {
            $(this)
                .find("input")
                .not('[name="_token"], [type="hidden"], [type="checkbox"]')
                .val("")
                .attr("value", "");
            $(this).find("input[type=checkbox]").prop("checked", false);
            $(this).find("select[name=parent_category]").val("");
            $(this).find("select[name=category_id]").val("");
            $(this).find("select[name=parent_id]").val("");
            $(this).find("select#roles").val([]);
            $(this).find("textarea").val("");
            $(this).find(".error").html(``);
            $(this).find("img").attr("src", "").addClass("hidden");
            $(this).find("span.text-red-500").html(``);
            $(this).find("select[name=categories-product]").val("");
            $(this).find("select[name=categories-post]").val("");
            $(this)
                .find("select[name=categories-product]")
                .prop("disabled", false);
            $(this)
                .find("select[name=categories-post]")
                .prop("disabled", false);
            $(this)
                .find("input[name=link-name]")
                .removeClass("opacity-50 pointer-events-none");
            $(this)
                .find(".attribute_variant_check").html(``);
        });
        $("div.error").html(``);


        modal.addClass("pointer-events-none opacity-0 scale-0");
        $(".modal-" + modal_name + "-is-open").removeClass(
            "animate_translate_down",
        );

        if (tinymce.get("edit-post-content")) {
            tinymce.get("edit-post-content").setContent("");
        }

        if (tinymce.get("edit-product-content")) {
            tinymce.get("edit-product-content").setContent("");
        }

        $.ajax({
            type: "post",
            url: "/admin/session/clear",
        });
    });
}
