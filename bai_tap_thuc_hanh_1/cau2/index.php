<?php
$filename = "Quiz.txt";

$quizzes = [];
$currentQuestion = "";
$options = [];
$answer = "";

if (file_exists($filename)) {
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if ($line === "") continue;
            $currentQuestion = $line;
            while (($line = fgets($file)) !== false) {
                $line = trim($line);
                if ($line === "") continue;
                if (str_starts_with($line, "ANSWER:")) {
                    $answer = trim(substr($line, 7));
                    break;
                }
                $options[] = $line;
            }
            $quizzes[] = [
                "question" => $currentQuestion,
                "options" => $options,
                "answer" => $answer
            ];
            $currentQuestion = "";
            $options = [];
            $answer = "";
        }
        fclose($file);
    } else {
        echo "Không thể mở file!";
    }
} else {
    echo "File không tồn tại!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>BT2</title>
</head>

<body>

    <label>
        <input type="checkbox" id="hide"> Ẩn đáp án
    </label>

    <?php foreach ($quizzes as $index => $q): ?>
        <div class="quiz-block" style="margin-bottom: 20px;">
            <strong>Câu hỏi <?php echo $index + 1; ?>:</strong>
            <?php echo htmlspecialchars($q['question']); ?><br><br>

            <strong>Lựa chọn:</strong><br>
            <?php foreach ($q['options'] as $opt):
                $value = substr($opt, 0, 1); // Lấy A, B, C, D
            ?>
                <label>
                    <input type="checkbox" class="choose-answer" value="<?php echo $value; ?>">
                    <?php echo htmlspecialchars($opt); ?>
                </label><br>
            <?php endforeach; ?>

            <div class="answer-block" style="margin-top: 5px;">
                <strong>Đáp án:</strong>
                <span class="correct-answer"><?php echo htmlspecialchars($q['answer']); ?></span>
                <div class="result" style="font-weight: bold; margin-top: 5px;"></div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- script  -->
    <script>
        // Ẩn/hiện đáp án
        document.getElementById("hide").addEventListener("change", function() {
            const hide = this.checked;
            document.querySelectorAll(".answer-block").forEach(a => {
                a.style.display = hide ? "none" : "inline";
            });
        });

        // Hiển thị kết quả ngay khi chọn
        document.querySelectorAll(".quiz-block").forEach(block => {
            const correctText = block.querySelector(".correct-answer").innerText.trim();

            const correctAnswers = correctText.split(",").map(a => a.trim());

            const resultBox = block.querySelector(".result");

            const checkboxes = block.querySelectorAll(".choose-answer");

            checkboxes.forEach(cb => {
                cb.addEventListener("change", function() {
                    // Lấy tất cả các checkbox được chọn
                    const selected = Array.from(checkboxes)
                        .filter(c => c.checked)
                        .map(c => c.value.trim());

                    // Kiểm tra: tất cả đáp án đúng đều được chọn và không có đáp án sai
                    const isCorrect = selected.length === correctAnswers.length &&
                        selected.every(val => correctAnswers.includes(val));

                    if (isCorrect) {
                        resultBox.style.color = "green";
                        resultBox.innerText = "Kết quả: ĐÚNG ✔️";
                    } else {
                        resultBox.style.color = "red";
                        resultBox.innerText = "Kết quả: SAI ❌";
                    }
                });
            });
        });
    </script>

</body>

</html>