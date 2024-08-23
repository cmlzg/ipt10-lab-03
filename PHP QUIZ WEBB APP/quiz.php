<?php

require "helpers.php";

// Check if the HTTP method used is POST; if not, redirect to the index.php page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve and sanitize user inputs
$complete_name = htmlspecialchars($_POST['complete_name']);
$email = htmlspecialchars($_POST['email']);
$birthdate = htmlspecialchars($_POST['birthdate']);
$contact_number = htmlspecialchars($_POST['contact_number']);
$agree = isset($_POST['agree']); 


$questions = retrieve_questions();


$answers = $_POST['answers'] ?? array_fill(0, count($questions['questions']), null);


if (isset($_POST['answers'])) {
    $submitted_answers = $_POST['answers'];
    foreach ($submitted_answers as $index => $answer) {
        $answers[$index] = htmlspecialchars($answer);
    }
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>

    
    <form id="quiz-form" method="POST" action="result.php"> 
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />
        <input type="hidden" name="agree" value="<?php echo $agree ? 'true' : 'false'; ?>" />

        
        <?php foreach ($questions['questions'] as $index => $question): ?>
            <div class="box">
                <h2 class="subtitle">Question <?php echo $index + 1; ?> / <?php echo count($questions['questions']); ?></h2>
                <p><?php echo htmlspecialchars($question['question']); ?></p>

                <?php foreach ($question['options'] as $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option['key']); ?>"
                                    <?php echo $answers[$index] === $option['key'] ? 'checked' : ''; ?> />
                                <?php echo htmlspecialchars($option['value']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <!-- Submit button -->
        <button type="submit" class="button is-link">Submit</button>
    </form>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    setTimeout(function() {
        document.getElementById('quiz-form').submit();
    }, 60000); 
});
</script>

</body>
</html>
