<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['user']['uuid'])) {
    echo json_encode(['status' => 'error']);
    exit;
}

// IMPORTANT: Never trust frontend blindly
// At minimum, validate format

if (!preg_match('/^[a-f0-9\-]{36}$/', $data['user']['uuid'])) {
    echo json_encode(['status' => 'invalid uuid']);
    exit;
}

$_SESSION['user_uuid'] = $data['user']['uuid'];
$_SESSION['username'] = $data['user']['username'];

echo json_encode(['status' => 'success']);