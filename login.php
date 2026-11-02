<?php
$pageTitle = 'Авторизация';
// Демонстрационные данные для учебного задания (не для настоящей авторизации).
$correctLogin = 'anastasia';
$correctPassword = '251361';
$sent = $_SERVER['REQUEST_METHOD'] === 'POST';
$login = trim((string)($_POST['login'] ?? ''));
$password = (string)($_POST['password'] ?? '');
$success = $sent && hash_equals($correctLogin, $login) && hash_equals($correctPassword, $password);
include 'header.php';
?>
<section class="heading">
    <div class="tag">САМОСТОЯТЕЛЬНОЕ ЗАДАНИЕ</div>
    <h1>Форма авторизации</h1>
    <p>Данные отправляются методом POST на эту же страницу.</p>
</section>
<section class="card">
    <?php if ($sent): ?>
        <div class="notice <?= $success ? 'notice-success' : 'notice-error' ?>">
            <?= $success ? 'Авторизация прошла успешно!' : 'Неверный логин или пароль.' ?>
        </div>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="form-row">
            <label for="login">Логин</label>
            <input id="login" type="text" name="login" value="<?= e($login) ?>" required autocomplete="username">
        </div>
        <div class="form-row">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
        </div>
        <div class="form-row action-row"><span class="empty-label"></span><button type="submit">Войти</button></div>
    </form>
</section>
<?php include 'footer.php'; ?>
