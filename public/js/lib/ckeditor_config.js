ClassicEditor.create(document.querySelector("#editor"), {
    toolbar: [
        "heading",
        "bold",
        "italic",
        "link",
        "bulletedList",
        "numberedList"
    ],
    heading: {
        options: [
            {
                model: "paragraph",
                title: "本文",
                class: "ck-heading_paragraph"
            },
            {
                model: "heading3",
                view: "h3",
                title: "見出し 3",
                class: "ck-heading_heading3"
            },
            {
                model: "heading4",
                view: "h4",
                title: "見出し 4",
                class: "ck-heading_heading4"
            },
            {
                model: "heading5",
                view: "h5",
                title: "見出し 5",
                class: "ck-heading_heading5"
            },
            {
                model: "heading6",
                view: "h6",
                title: "見出し 6",
                class: "ck-heading_heading6"
            },
            {
                model: "code",
                view: "code",
                title: "コード",
                class: "ck-code"
            }
        ]
    }
}).catch(error => {
    console.error(error);
});
