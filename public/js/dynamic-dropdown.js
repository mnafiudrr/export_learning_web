/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/dynamic-dropdown.js ***!
  \******************************************/
var totalData = $(".content-data-count").data("total");
console.log("total data: ", totalData);
var i = totalData; // Needs index on form array of object , source: https://stackoverflow.com/a/47051011/14169269

var first;
var dropdowns = $(".dropdown-content-types");
console.log("num of dd", dropdowns.length);
$("#btnAppend").click(function () {
  var dropdowns = $(".dropdown-content-types");
  var clone = $("#dropdownContentTypes0").clone();
  $(clone).change(function (e) {
    return onContentChange(e);
  });
  clone.addClass("my-2");
  clone.attr("id", "");
  if (dropdowns.length === 0) i = dropdowns.length + 1;
  if (dropdowns.length > 0) i = dropdowns.length;
  clone.attr("data-key", i);
  var label = "<label class=\"mt-4\" for=\"\">Tipe Konten ".concat(i + 1, "</label>\n    ");
  clone.addClass("dropdown-content-types-" + i);
  clone.attr("name", "contents[".concat(i, "][content_type]"));
  $("#btnAppend").before(label);
  $("#btnAppend").before(clone);
  console.log("lbl , clone", label, clone); // console.log("dds", dropdowns);
  // console.log(
  // );

  console.log($(dropdowns[0]));
});

function onContentChange(e) {
  var contentType = e.target.value.trim();
  console.log("ctype:", contentType);
  var input;
  var key = $(e.target).data("key");
  console.log("data i", key);
  var currentId = "content-value-".concat(key);
  var current = $("#".concat(currentId));

  if (current) {
    $("#label-".concat(currentId)).remove();
    current.remove();
  }

  if (contentType === "image") {
    // console.log("is image");
    input = "\n        <label for=\"content-value-".concat(key, "\" id=\"label-content-value-").concat(key, "\" class=\"mt-3 mb-0  \">Isi Konten ").concat(key + 1, " (Gambar)</label>\n        <input\n                        type=\"file\"\n                        class=\"form-control mb-3\"\n                        name=\"contents[").concat(key, "][value]\"\n                        id=\"content-value-").concat(key, "\"\n                    /> ");
  } else if (contentType === "text") {
    input = "\n        <label for=\"content-value-".concat(key, "\" id=\"label-content-value-").concat(key, "\" class=\"mt-3 mb-0  \">Isi Konten ").concat(key + 1, " (Paragraf)</label>\n        <textarea\n                        class='form-control my-3'\n                        name=\"contents[").concat(key, "][value]\"\n                        cols=\"50\"\n                        rows=\"10\"\n                        id=\"content-value-").concat(key, "\"\n                        placeholder=\"ketik disinis\"\n\n                    ></textarea>");
  } else if (contentType === "link") {
    input = "\n        <label for=\"content-value-".concat(key, "\" id=\"label-content-value-").concat(key, "\" class=\"mt-3 mb-0  \">Isi Konten ").concat(key + 1, " (Link Video)</label>\n        <input\n        type=\"url\"\n        class=\"form-control my-3\"\n                        name=\"contents[").concat(key, "][value]\"\n                        id=\"content-value-").concat(key, "\"\n                        placeholder=\"ex: https://youtube.com/watch?q=1721727\"\n\n\n                    />");
  } else if (contentType === "doc") {
    input = "   \n        <label for=\"content-value-".concat(key, "\" id=\"label-content-value-").concat(key, "\" class=\"mt-3 mb-0  \">Isi Konten ").concat(key + 1, " (Dokumen)</label>\n        <input\n            type=\"file\"\n            class=\"form-control my-3\"\n            name=\"contents[").concat(key, "][value]\"\n            id=\"content-value-").concat(key, "\"\n         /> \n    \n    ");
  }

  console.log("input:", input); // document.getElementById("content").innerHTML = input;

  console.log($(".dropdown-content-types-".concat(i)));
  $(e.target).after(input);
}

$(".dropdown-content-types").change(function (e) {
  return onContentChange(e);
});
/******/ })()
;