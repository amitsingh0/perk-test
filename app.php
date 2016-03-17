<?php
/**
 * API entry point for the application
 */
define('STATUS_FAILURE', 'failure');
define('STATUS_SUCCESS', 'success');

$config = require_once __DIR__ . '/src/bootstrap.php';

$response = array(
	'status' => STATUS_FAILURE
);

try {
    $contactsAPI = new Perk\ContactsAPI($_SERVER['REQUEST_URI'], $_SERVER['HTTP_ORIGIN'], $config);
    $result = $contactsAPI->processAPI();
    $response['status'] = ($result)? STATUS_SUCCESS : STATUS_FAILURE;
} catch (Exception $e) {
    $response['status'] = STATUS_FAILURE;
    $response['error'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);