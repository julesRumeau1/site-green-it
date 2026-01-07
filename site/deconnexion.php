<?php
require_once __DIR__ . '/src/bootstrap.php';
$auth = new AuthService(new UserRepository());
$auth->logout();
header('Location: index.php');
exit;
