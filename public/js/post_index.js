$(function() {
    $("input:checkbox")
        .change(function() {
            var cnt = $("input:checkbox:checked").length;
            $("#merge_cnt").text(cnt);

            var prop = $(this).prop("checked");

            if (prop) {
                var articleTitle = $(
                    'a[data-title-id="' + $(this).val() + '"]'
                ).text();
                $("#merge_list ul").append(
                    '<li class="bg-white p-3 m-1 list-group-item border-0 shadow-sm rounded" data-title-id="' +
                        $(this).val() +
                        '">' +
                        '<i class="fas fa-arrows-alt mr-3 text-primary"></i>' +
                        articleTitle +
                        '<input type="hidden" name="mergeList[]" value="' +
                        $(this).val() +
                        '">' +
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
