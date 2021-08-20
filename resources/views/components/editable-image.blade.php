<div class="editable-image-container">
    <label for="{{ $fileInputName }}">
        <img class="editable-image" src="{{
            $isSrcUrl === true ? $imgSrc : asset("storage/".$imgSrc)
        }}" style="display: {{ $imgSrc === "" ? "none" : "block" }}" id="{{
            $imgId
        }}" />
        <h4 class="editable-image-text">Ubah</h4>
    </label>
</div>

<button
    class="btn btn-danger btn-remove-image"
    style="display: {{ $imgSrc === '' ? 'none' : 'block' }}"
    type="button"
    id="btnRemoveImg{{ $imgId }}"
>
    Hapus
</button>
<div class="form-group">
    <input
        type="file"
        id="{{ $fileInputName }}"
        name="{{ $fileInputName }}"
        class="form-control"
        style="display: {{ $imgSrc === '' ? 'block' : 'none' }}"
    />
    <input
        type="text"
        style="visibility: hidden"
        name="{{ $fileInputName }}"
        value="{{ $imgSrc }}"
        id="{{ $fileInputName }}-text"
    />
</div>
<script>
    // console.log("test");

    document
        .getElementById("btnRemoveImg{{$imgId}}")
        .addEventListener("click", (e) => {
            console.log(e);

            $("#{{$imgId}}").hide();

            const input = document.getElementById("{{$fileInputName}}");
            const inputText = document.getElementById(
                "{{$fileInputName}}" + "-text"
            );
            $(input).show();
            $(inputText).remove();

            $(input).val(null);

            $(e.target).hide();
            console.log($("#{{$fileInputName}}").val(null));
        });
    document
        .getElementById("{{$fileInputName}}")
        .addEventListener("change", (e) => {
            const input = e.target;

            if ($(input)[0].files) {
                const imageFiles = $(input)[0].files;
                // console.log("typeof files", typeof imageFiles);
                Object.values(imageFiles).map((item) => {
                    console.log("file", item);
                    var reader = new FileReader();

                    reader.onprogress = (e) => {
                        console.log(e.loaded);
                    };
                    reader.onload = function (e) {
                        console.log(e.target.result);
                        let img = "#{{$imgId}}";
                        // <img src="" alt="" class="product-images">

                        $("#{{$fileInputName}}-text").remove();
                        $(img).attr("src", e.target.result);

                        $("#{{$imgId}}").show();
                        $("#{{$fileInputName}}").hide();

                        $("#btnRemoveImg{{$imgId}}").show();

                        // $(".img-row").prepend(img);
                        // $("#changeImg").toggleClass("d-none");
                        console.log("done");
                    };
                    reader.readAsDataURL(item); // convert to base64 string
                });
            }
        });
</script>
