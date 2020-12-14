<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сохранение анкеты</title>
</head>
<body>

<form action="get_profile.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <input type="text" name="surname" placeholder="Фамилия">    
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="middle" placeholder="Отчество">
        <input type="date" name="year" placeholder="Дата рождения">
    </fieldset>
    <fieldset>
        <p>Выберите картинку для аватара</p>
        <input type="file" name="avatar">
    </fieldset>
    <button>Отправить анкету</button>
</form>
    
</body>
</html>