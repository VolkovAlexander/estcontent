<?php

$candidates = $_POST['candidates'];
$candidates = explode("\n", $candidates);

if(!empty($candidates)) {
    $candidates = array_unique($candidates);

    foreach ($candidates as $index => $candidate) {
        if(strlen($candidate) === 0) {
            unset($candidates[$index]);
        }
    }
}

echo json_encode([
    'total' => count($candidates),
    'list' => array_values($candidates)
]);