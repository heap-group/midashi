$(function() {
    $("input:checkbox")
        .change(function() {
            var cnt = $("input:checkbox:checked").length;
            $("#merge_cnt").text(cnt);

            var prop = $(this).prop("checked");

            if (prop) {
                $("#merge_action").prepend(
                    '<input type="hidden" name="mergeList[]" value="' +
                        $(this).val() +
                        '">'
                );

                var articleTitle = $(
                    'a[data-title-id="' + $(this).val() + '"]'
                ).text();
                $("#merge_list ul").append(
                    '<li data-title-id="' +
                        $(this).val() +
                        '">' +
                        articleTitle +
                        "</li>"
                );
            } else {
                $('input[type=hidden][value="' + $(this).val() + '"]').remove();
                $('li[data-title-id="' + $(this).val() + '"]').remove();
            }
        })
        .trigger("change");

    $(".remove").click(function() {
        var removeId = $(this).data("remove-id");
        var categoryId = $(this).data("remove-category-id");
        var titleText = $('a[data-title-id="' + removeId + '"]').text();
        $("#remove_title").text(titleText);
        $("#post_remove_form").prepend(
            '<input type="hidden" name="id" value="' +
                removeId +
                '">' +
                '<input type="hidden" name="category_id" value="' +
                categoryId +
                '">'
        );
    });
});
