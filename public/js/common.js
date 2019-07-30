$(function() {
    $(".add_new_category").click(function() {
        var add = $("#add_category_form");
        add.toggleClass("d-none");

        if (add.hasClass("d-none")) {
            $("#add_category_form input").removeAttr("name");
        } else {
            $("#add_category_form input").attr("name", "category_name");
        }
        var select = $("#select_category_form");
        select.toggleClass("d-none");

        if (select.hasClass("d-none")) {
            $("#select_category_form select").removeAttr("name");
        } else {
            $("#select_category_form select").attr("name", "category_name");
        }
    });
});
