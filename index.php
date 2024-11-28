<?php

require_once 'Alarme.php';
require_once 'utils.php';

$alarme = new Alarme();
$alarme->setMessage("Fin des cours !");

$uri = $_SERVER['REQUEST_URI'] ?? '';

$validation = validateSlug($uri);

if (empty($validation['errors'])) {
  $params = $validation['data'];
  http_response_code(200);
  echo json_encode([
      'status' => 'success',
      'result' => "$alarme",
  ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
  http_response_code(400);
  echo json_encode([
      'status' => 'error',
      'message' => implode(', ', $validation['errors']),
  ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

