$("#btnAppendQuiz").click((e) => {
    console.log("clicked", e.target);

    let quizSection = $(".quis-section");

    console.log(quizSection.length);
    if (quizSection.length > 1) {
        console.log(quizSection);
        quizSection = $(quizSection[quizSection.length - 1]);

        // console.log("after:", quizSection);
    }
    const clone = quizSection.clone();

    const key = quizSection.data("key");
    clone.attr("data-key", key + 1);
    const currentTotal = $(".quis-section").length;
    const answerInputs = clone.find(".answer-input");

    const soalInput = clone.find("#soal-0");

    soalInput.attr("name", `questions[${key + 1}][question]`);
    const questionInput = clone.find(".question");
    const answerKeyInput = clone.find("#answer-key");

    const soalTitle = clone.find(".soal-title-number");

    soalTitle.text(`Soal ${currentTotal + 1}`);
    questionInput.val("");

    answerKeyInput.val("");
    answerKeyInput.attr("name", `questions[${key + 1}][key]`);
    answerInputs.map((idx, item) => {
        console.log("ha", item);

        $(item).attr("name", `questions[${key + 1}][answers][]`);
        $(item).val("");
        // $(item).attr("id", `question[${key + 1}][answers][]`);
    });

    $("#btnAppendQuiz").before(clone);
});
