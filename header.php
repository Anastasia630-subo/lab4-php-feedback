<?php
$pageTitle = $pageTitle ?? 'Форма обратной связи';
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> — Лабораторная №4 — Биябева Анастасия</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <div>
            <div class="brand">БИЯБЕВА АНАСТАСИЯ АЛЕКСЕЕВНА</div>
            <div class="meta">Группа 251-361 · Лабораторная работа №4</div>
        </div>
        <nav aria-label="Навигация">
            <a href="index.php">Обратная связь</a>
            <a href="login.php">Авторизация</a>
        </nav>
    </div>
</header>
<main class="container main">
