<?php
require_once __DIR__ . '/vendor/autoload.php'; // Autoload required for phpdotenv

use Dotenv\Dotenv;

// Hàm ghi log
function logEntry($message)
{
  $logFile = '../../../logs/payment_update_log.txt';
  $timestamp = date("Y-m-d H:i:s");
  // get full path
  $filePath = $_SERVER['PHP_SELF'];
  $logMessage = "[$timestamp] $filePath: $message\n";
  file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Hàm lấy giá trị từ file .env
function getValueEnv($key)
{
  // Load the .env file
  $dotenv = Dotenv::createImmutable(__DIR__); // Specify the directory where .env is located
  $dotenv->load();
  return $_ENV[$key];
}
