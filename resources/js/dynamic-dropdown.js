const totalData = $(".content-data-count").data("total");

console.log("total data: ", totalData);

let i = totalData; // Needs index on form array of object , source: https://stackoverflow.com/a/47051011/14169269
let first;

const dropdowns = $(".dropdown-content-types");

console.log("num of dd", dropdowns.length);
$("#btnAppend").click(function () {
    const dropdowns = $(".dropdown-content-types");

    const clone = $("#dropdownContentTypes0").clone();
    $(clone).change((e) => onContentChange(e));

    clone.addClass("my-2");
    clone.attr("id", "");
    if (dropdowns.length === 0) i = dropdowns.length + 1;
    if (dropdowns.length > 0) i = dropdowns.length;
    clone.attr("data-key", i);
    const label = `<label class="mt-4" for="">Tipe Konten ${i + 1}</label>
    `;
    clone.addClass("dropdown-content-types-" + i);
    clone.attr("name", `contents[${i}][content_type]`);
    $("#btnAppend").before(label);

    $("#btnAppend").before(clone);

    console.log("lbl , clone", label, clone);

    // console.log("dds", dropdowns);
    // console.log(
    // );

    console.log($(dropdowns[0]));
});
function onContentChange(e) {
    const contentType = e.target.value.trim();

    console.log("ctype:", contentType);
    let input;

    const key = $(e.target).data("key");
    console.log("data i", key);

    const currentId = `content-value-${key}`;
    const current = $(`#${currentId}`);
    if (current) {
        $(`#label-${currentId}`).remove();
        current.remove();
        $(`.doc-downloadable-${key}`).remove();
        // .map((item, idx) => {
        //     item.remove();
        // });
    }
    if (contentType === "image") {
        // console.log("is image");
        input = `
        <label for="content-value-${key}" id="label-content-value-${key}" class="mt-3 mb-0  ">Isi Konten ${
            key + 1
        } (Gambar)</label>
        <input
                        type="file"
                        class="form-control mb-3"
                        name="contents[${key}][value]"
                        id="content-value-${key}"
                    /> `;
    } else if (contentType === "text") {
        input = `
        <label for="content-value-${key}" id="label-content-value-${key}" class="mt-3 mb-0  ">Isi Konten ${
            key + 1
        } (Paragraf)</label>
        <textarea
                        class='form-control my-3'
                        name="contents[${key}][value]"
                        cols="50"
                        rows="10"
                        id="content-value-${key}"
                        placeholder="ketik disinis"

                    ></textarea>`;
    } else if (contentType === "link") {
        input = `
        <label for="content-value-${key}" id="label-content-value-${key}" class="mt-3 mb-0  ">Isi Konten ${
            key + 1
        } (Link Video)</label>
        <input
        type="url"
        class="form-control my-3"
                        name="contents[${key}][value]"
                        id="content-value-${key}"
                        placeholder="ex: https://youtube.com/watch?q=1721727"


                    />`;
    } else if (contentType === "doc") {
        input = `   
        <label for="content-value-${key}" id="label-content-value-${key}" class="mt-3 mb-0  ">Isi Konten ${
            key + 1
        } (Dokumen)</label>
        <input
            type="file"
            class="form-control my-3"
            name="contents[${key}][value]"
            id="content-value-${key}"
         /> 
    
    `;
    }

    console.log("input:", input);
    // document.getElementById("content").innerHTML = input;

    console.log($(`.dropdown-content-types-${i}`));
    $(e.target).after(input);
}

$(".dropdown-content-types").change((e) => onContentChange(e));
