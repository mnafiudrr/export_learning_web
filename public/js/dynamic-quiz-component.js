/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/js/dynamic-quiz-component.js ***!
  \************************************************/
$("#btnAppendQuiz").click(function (e) {
  console.log("clicked", e.target);
  var quizSection = $(".quis-section");
  console.log(quizSection.length);

  if (quizSection.length > 1) {
    console.log(quizSection);
    quizSection = $(quizSection[quizSection.length - 1]); // console.log("after:", quizSection);
  }

  var clone = quizSection.clone();
  var key = quizSection.data("key");
  clone.attr("data-key", key + 1);
  var currentTotal = $(".quis-section").length;
  var answerInputs = clone.find(".answer-input");
  var soalInput = clone.find("#soal-0");
  soalInput.attr("name", "questions[".concat(key + 1, "][question]"));
  var questionInput = clone.find(".question");
  var answerKeyInput = clone.find("#answer-key");
  var soalTitle = clone.find(".soal-title-number");
  soalTitle.text("Soal ".concat(currentTotal + 1));
  questionInput.val("");
  answerKeyInput.val("");
  answerKeyInput.attr("name", "questions[".concat(key + 1, "][key]"));
  answerInputs.map(function (idx, item) {
    console.log("ha", item);
    $(item).attr("name", "questions[".concat(key + 1, "][answers][]"));
    $(item).val(""); // $(item).attr("id", `question[${key + 1}][answers][]`);
  });
  $("#btnAppendQuiz").before(clone);
});
/******/ })()
;