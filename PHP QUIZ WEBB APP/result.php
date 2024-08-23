<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = htmlspecialchars($_POST['complete_name']);
$email = htmlspecialchars($_POST['email']);
$birthdate = htmlspecialchars($_POST['birthdate']);
$contact_number = htmlspecialchars($_POST['contact_number']);

$answers = $_POST['answers'] ?? [];
if (is_array($answers)) {
    $answer_array = array_map('htmlspecialchars', $answers); 
} else {
    $answer_array = [];
}

$score = compute_score($answer_array); 

$date = new DateTime($birthdate);
$formatted_birthdate = $date->format('F j, Y');


if ($score == 500) { 
    $hero_section = '
        <section class="hero is-success">
            <div class="hero-body">
                <p class="title">Congratulations, You got a perfect score!</p>
            </div>
        </section>';
    $confetti_canvas = '<canvas id="confetti-canvas" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; pointer-events: none; z-index: 9999;"></canvas>';
} elseif ($score > 200) {
    $hero_section = '
        <section class="hero is-success">
            <div class="hero-body">
                <p class="title">Congratulations, You did well!</p>
            </div>
        </section>';
    $confetti_canvas = ''; 
} else {
    $hero_section = '
        <section class="hero is-danger">
            <div class="hero-body">
                <p class="title">Better luck next time :)</p>
            </div>
        </section>';
    $confetti_canvas = ''; 
}

$questions = retrieve_questions();
$correct_answers = get_answers();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<?php echo $hero_section; ?>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo $formatted_birthdate; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question Number</th>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions['questions'] as $index => $question): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($question['question']); ?></td>
                        <td><?php echo htmlspecialchars($correct_answers[$index] ?? 'N/A'); ?></td>
                        <td><?php echo !empty($answer_array[$index]) ? htmlspecialchars($answer_array[$index]) : 'N/A'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <?php echo $confetti_canvas; ?>
</section>

<script>
<?php if ($score == 500): ?>
document.addEventListener("DOMContentLoaded", function() {
    var confettiSettings = {
        target: 'confetti-canvas'
    };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
});
<?php endif; ?>
</script>
</body>
</html>
