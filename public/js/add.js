$(function() {
    $(".add_category_btn").click(function() {
        var add = $("#add_category_text");
        add.toggleClass("d-none");

        if (add.hasClass("d-none")) {
            $("#add_category_text input").removeAttr("name");
        } else {
            $("#add_category_text input").attr("name", "category_name");
        }
        var select = $("#category_area");
        select.toggleClass("d-none");

        if (select.hasClass("d-none")) {
            $("#category_area input").removeAttr("name");
        } else {
            $("#category_area input").attr("name", "category_name");
        }
    });
});
