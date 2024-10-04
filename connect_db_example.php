<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Створити підключення
$conn = new mysqli($servername, $username, $password);
// Перевірити підключення
if ($conn->connect_error) {
  die("Підключення не вдалося: " . $conn->connect_error);
}

// Створити базу даних
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Базу даних створено успішно";
} else {
  echo "Помилка створення бази даних: " . $conn->error;
}

$conn->close();
?> 