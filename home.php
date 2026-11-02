<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
$pageTitle = 'Ответ на обращение';
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$category = (string)($_POST['category'] ?? '');
$source = (string)($_POST['source'] ?? '');
$consent = isset($_POST['consent']);
$valid = $name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)
    && $message !== '' && in_array($category, ['propose', 'complaint'], true)
    && in_array($source, ['internet', 'friends'], true) && $consent;
// Имя отправленного файла находится в $_FILES, не в $_POST.
$fileName = '';
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    $fileName = basename(str_replace('\\', '/', (string)$_FILES['attachment']['name']));
}
$query = http_build_query(['name' => $name, 'email' => $email, 'source' => $source]);
include 'header.php';
?>
<section class="heading">
    <div class="tag">РЕЗУЛЬТАТ ОТПРАВКИ</div>
    <h1>Ответ на обращение</h1>
</section>
<section class="card">
<?php if (!$valid): ?>
    <h2>Не удалось обработать обращение</h2>
    <p>Проверьте заполнение обязательных полей и согласие на обработку данных.</p>
<?php else: ?>
    <h2>Здравствуйте, <?= e($name) ?>!</h2>
    <?php if ($category === 'propose'): ?>
        <p>Спасибо за ваше предложение:</p>
    <?php else: ?>
        <p>Мы рассмотрим вашу жалобу:</p>
    <?php endif; ?>
    <div class="message-box"><?= nl2br(e($message)) ?></div>
    <?php if ($fileName !== ''): ?>
        <p class="attachment">Вы приложили следующий файл: <strong><?= e($fileName) ?></strong></p>
    <?php endif; ?>
<?php endif; ?>
    <a class="button-link" href="index.php?<?= e($query) ?>">Заполнить снова</a>
</section>
<?php include 'footer.php'; ?>
