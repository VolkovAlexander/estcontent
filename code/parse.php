<?php

$candidates = $_POST['candidates'];
$candidates = explode("\n", $candidates);

echo json_encode([
    'total' => count($candidates),
    'list' => $candidates
]);