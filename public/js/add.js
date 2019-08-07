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

    $(".post_parts").on("click", function(e) {
        //TODO: commonに移動する
        var codeOption = {
            h3: "### 中見出し\n",
            h4: "#### 小見出し\n",
            bold: "**強調**\n",
            li: "- リスト\n",
            link: "[リンク名](URL)\n",
            code: "```:言語を設定\n" + "コード入力欄\n" + "```\n",
            table:
                "|ヘッダー1  |ヘッダー2  |ヘッダー3  |\n| ---| ---| ---|\n| 入力1 | 入力2 | 入力3 |\n",
            quote: "> テキスト\n> テキスト\n> テキスト\n"
        };

        var text_data = document.querySelector("textarea#post_textarea");

        var text_val = post_textarea.value;
        var all_len = text_val.length;
        var select_len = post_textarea.selectionStart;

        var first = text_val.substr(0, select_len);
        var insert = $(this).data("code");
        var latter = text_val.substr(select_len, all_len);
        text_val = codeOption[insert];
        post_textarea.value += text_val;
    });
});
