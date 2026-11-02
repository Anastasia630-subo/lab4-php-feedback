<?php
$pageTitle = 'Форма обратной связи';
// GET-параметры используются только для заполнения формы при возврате.
$name = trim((string)($_GET['name'] ?? ''));
$email = trim((string)($_GET['email'] ?? ''));
$source = (string)($_GET['source'] ?? '');
if (!in_array($source, ['internet', 'friends'], true)) {
    $source = '';
}
include 'header.php';
?>
<section class="heading">
    <div class="tag">PHP · ОБРАБОТКА ФОРМ</div>
    <h1>Форма обратной связи</h1>
    <p>Заполните поля ниже. После отправки появится страница с ответом на обращение.</p>
</section>
<section class="card">
    <form action="home.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <label for="name">ФИО</label>
            <input id="name" name="name" type="text" value="<?= e($name) ?>" required maxlength="150" autocomplete="name">
        </div>
        <div class="form-row">
            <label for="email">Ваш e-mail</label>
            <input id="email" name="email" type="email" placeholder="example@mail.ru" value="<?= e($email) ?>" required autocomplete="email">
        </div>
        <div class="form-row">
            <label for="category">Тема обращения</label>
            <select id="category" name="category" required>
                <option value="propose">Предложение</option>
                <option value="complaint">Жалоба</option>
            </select>
        </div>
        <div class="form-row">
            <label for="message">Сообщение</label>
            <textarea id="message" name="message" rows="6" required maxlength="5000" placeholder="Напишите текст обращения"></textarea>
        </div>
        <div class="form-row">
            <label for="attachment">Прикрепить файл</label>
            <input id="attachment" name="attachment" type="file">
        </div>
        <fieldset class="form-row fieldset-row">
            <legend>Откуда вы узнали о нас?</legend>
            <div class="options">
                <label class="option"><input type="radio" name="source" value="internet" <?= $source === 'internet' ? 'checked' : '' ?> required> Реклама из интернета</label>
                <label class="option"><input type="radio" name="source" value="friends" <?= $source === 'friends' ? 'checked' : '' ?>> Рассказали друзья</label>
            </div>
        </fieldset>
        <div class="form-row">
            <span class="empty-label"></span>
            <label class="option consent"><input type="checkbox" name="consent" value="1" required> Даю согласие на обработку данных</label>
        </div>
        <div class="form-row action-row"><span class="empty-label"></span><button type="submit">Отправить</button></div>
    </form>
</section>
<?php include 'footer.php'; ?>
