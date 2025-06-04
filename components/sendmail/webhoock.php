<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Безпечне отримання даних
    $utm_source = $_POST['utm_source'] ?? '';
    $utm_medium = $_POST['utm_medium'] ?? '';
    $utm_campaign = $_POST['utm_campaign'] ?? '';
    $utm_content = $_POST['utm_content'] ?? '';
    $utm_term = $_POST['utm_term'] ?? '';
    $name = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $webhook_url = 'https://hook.eu1.make.com/xkoq7xodbpmzw1rzoau7ll117pm2s82y';

    $data = array(
        'utm_source' => $utm_source,
        'utm_medium' => $utm_medium,
        'utm_campaign' => $utm_campaign,
        'utm_content' => $utm_content,
        'utm_term' => $utm_term,
        'name' => $name,
        'phone' => $phone,
    );

    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit;
}
