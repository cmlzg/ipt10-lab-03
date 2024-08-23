<?php

define('MAX_QUESTION_NUMBER', 50);

function retrieve_questions() {
    
    $json_string = file_get_contents("./questions/triviaquiz.json");
    
    $json_data = json_decode($json_string, true);
    
    return $json_data;
}

function get_current_question($answers = '') {
    $number_of_answers = strlen($answers);
    $questions = retrieve_questions();
    
    if (isset($questions['questions'][$number_of_answers])) {
        return $questions['questions'][$number_of_answers];
    } else {
        
        return null;
    }
}

function get_current_question_number($answers = '') {
    return strlen($answers) + 1;
}

function get_options_for_question_number($number = 0) {
    $questions = retrieve_questions();
    $index = $number - 1;
    
    if (isset($questions['questions'][$index]) && isset($questions['questions'][$index]['options'])) {
        return $questions['questions'][$index]['options'];
    } else {
        
        return [];
    }
}

function compute_score($answers = []) {
    $questions = retrieve_questions();
    $correct_answers = $questions['answers'];

    $score = 0;
    for ($i = 0; $i < MAX_QUESTION_NUMBER; $i++) {
        if (isset($correct_answers[$i]) && isset($answers[$i]) && $correct_answers[$i] == $answers[$i]) {
            $score += 100;
        }
    }
    return $score;
}

function get_answers() {
    $questions = retrieve_questions();
    return $questions['answers'];
}
