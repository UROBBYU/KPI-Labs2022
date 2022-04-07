<?php
    // Read json data
    $body = json_decode(file_get_contents('php://input'), true);
    $group = $body['array'];

    // Count male/female
    $counter_m = 0;
    $counter_f = 0;
    foreach ($group as $student) {
        if ($student['sex'] == 'Ч') $counter_m++;
        else $counter_f++;
    }

    // Find student by parameters
    function find_student($sur, $rate = false, $sex = false) {
        global $group;
        foreach ($group as $i => $student) {
            if (($sur == ($student['sur'] == $sur)) && ($rate == ($student['rate'] == $rate)) && ($sex == ($student['sex'] == $sex))) return $i + 1;
        }
    }

    // Execution
    header('Content-Type: application/json');
    if ($body['type'] == 'find') {
        if (!($body['sur'] || $body['rate'] || $body['sex'])) echo '{}';
        else {
            $found = find_student($body['sur'], $body['rate'], $body['sex']);
            if ($found) echo json_encode(array('id' => $found));
            else echo '{}';
        }
    } else {
        echo json_encode(array(
            'array' => $group,
            'boys' => $counter_m,
            'girls' => $counter_f
        ));
    }
?>