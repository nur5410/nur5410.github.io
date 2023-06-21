<?php
// Get the user information sent from the JavaScript code
$userInfo = $_POST['userInfo'];

// Log file path
$logFile = 'log.txt';

// Open the log file in append mode
$logHandle = fopen($logFile, 'a');

if ($logHandle) {
  // Write the user information to the log file
  fwrite($logHandle, $userInfo . PHP_EOL);

  // Close the log file
  fclose($logHandle);

  // Send a response indicating success
  http_response_code(200);
  echo 'User information logged successfully.';
} else {
  // Send a response indicating failure
  http_response_code(500);
  echo 'Failed to log user information.';
}
?>
