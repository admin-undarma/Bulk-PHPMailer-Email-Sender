<?php
require_once '../vendor/autoload.php';

use Services\MailService;

$to = $_POST['to'] ?? '';
$subject = $_POST['subject'] ?? '';
$body = $_POST['body'] ?? '';

$mailService = new MailService();

try {
    $response = $mailService->sendEmail($to, $subject, $body);
    echo json_encode(['success' => true, 'message' => $response]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
