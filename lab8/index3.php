<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заполнение формы</title>
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="style3.css" />
</head>
<body>
    <div class="container">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['patronymic']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['birthDate'])) {
        echo "<p>Регистрация прошла успешно!</p>";
    } else {
        echo "<p>Пожалуйста, заполните все поля формы!</p>";
    }
}
?>
<h1>Регистрация пользователя</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Фамилия:</label><br>
    <input type="text" name="name" required placeholder="Иванов"><br>
    <label for="surname">Имя:</label><br>
    <input type="text" name="surname" required placeholder="Иван"><br>
    <label for="patronymic">Отчество:</label><br>
    <input type="text" name="patronymic" required placeholder="Иванович"><br>
    <label for="birthDate">Дата рождения:</label><br>
    <input type="date" name="birthDate" required><br><br>
    <label for="username">Логин:</label><br>
    <input type="text" name="username" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" name="password" required><br><br>
    <input class="register" type="submit" value="Зарегистрироваться">
</form>
    </div>
</body>
</html>