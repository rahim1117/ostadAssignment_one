<?php
// Function to validate marks range
function validate_marks($marks) {
    return ($marks >= 0 && $marks <= 100);
}

// Function to calculate the grade using switch-case
function calculate_grade($average) {
    switch (true) {
        case ($average >= 80 && $average <= 100):
            return 'A+';
        case ($average >= 70 && $average < 79):
            return 'A';
        case ($average >= 60 && $average < 69):
            return 'A-';
        case ($average >= 50 && $average < 59):
            return 'B';
        case ($average >= 40 && $average < 49):
            return 'C';
        case ($average >= 33 && $average < 39):
            return 'D';
        default:
            return 'F';
    }
}

// Function to calculate the student's result
function calculate_result($marks) {
    $total_marks = 0;
    $failed = false;

    foreach ($marks as $mark) {
        // Validate the mark range
        if (!validate_marks($mark)) {
            echo "Mark range is invalid.\n";
            return;
        }

        // Check for fail condition
        if ($mark < 33) {
            $failed = true;
        }

        $total_marks += $mark;
    }

    // If the student has failed
    if ($failed) {
        echo "Student has failed.\n";
        return;
    }

    // Calculate the total and average marks
    $average_marks = $total_marks / count($marks);

    // Determine the grade
    $grade = calculate_grade($average_marks);

    // Output the result
    echo "Total Marks: " . $total_marks . "\n";
    echo "Average Marks: " . number_format($average_marks, 1) . "\n";  // Format average to 1 decimal place
    echo "Grade: " . $grade . "\n";
}

// Example input
$marks = [55, 45, 60, 39, 33];

// Calculate and display the result
calculate_result($marks);
?>
