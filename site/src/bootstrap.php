<?php

declare(strict_types=1);

// Basic security headers (lightweight).
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-Frame-Options: DENY');

// Minimal autoload.
spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/' . $class . '.php';
    if (is_file($path)) {
        require_once $path;
    }
});

// Start session early for CSRF/login.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Create CSRF token (for forms/pages).
Csrf::token();
