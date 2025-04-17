<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitizeInput($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $message = sanitizeInput($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Невалідна електронна адреса!";
        exit;
    }

    if (strlen($message) < 20) {
        echo "Повідомлення має мати мінімум 20 символів!";
        exit;
    }

    echo "Форма успішно надіслана!";
}
?>