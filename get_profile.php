<?php

$dir = "img";

// echo '<pre>';
// print_r($_POST);
// echo '<pre>';

// echo '<pre>';
// print_r($_FILES);
// echo '<pre>';

// Функция получения информации из формы

function getData()
{
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // echo 'OK1!';

        if(isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['middle']))
        {
            if(!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['middle']))
            {
                // echo 'OK2!';
                $profile = [];
                $profile['name']    = trim($_POST['name']);
                $profile['surname'] = trim($_POST['surname']);
                $profile['middle']  = trim($_POST['middle']);
                $profile['year']    = trim($_POST['year']);

                return $profile;
            }
            else
            {
                // echo 2;
                return false;
            }
        }
        else
        {   
            // echo 1;
            return false;
        }
    }
    else
    {
        // echo 3;
        return false;
    }
}

// Функция показа анкеты

function showProfile($data)
{
    if(isset($data) && !empty($data))
    {
        // echo'Ok004!';
        $profile  = "<p>Ваша фамилия: " . $data['surname'] . "</p>\n";
        $profile .= "<p>Ваше имя: " . $data['name'] . "</p>\n";
        $profile .= "<p>Ваше отчество: " . $data['middle'] . "</p>\n";
        $profile .= "<p>Дата рождения: " . $data['year'] . "</p>";

        echo $profile;
    }
}

// Функция загрузки аватарки на сервер

function uploadImage($dir)
{
    if($_FILES['error'] == 0)
    {
        // echo 'OK3!';

        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar = $_FILES['avatar']['tmp_name'];
              
        if($ext == "png" or $ext = "jpg")
        {
            // echo $ext;

            if(file_exists($dir))
            {
                // echo 'OK4';
                if(is_dir($dir))
                {
                    // echo 'OK5';
                    $avatar_name = time() . '.' . $ext;
                    
                    if (move_uploaded_file($avatar, $dir . '/' . $avatar_name))
                    {
                        echo '<p><b>Аватар успешно загружен!</b></p>';
                        showImage($dir, $avatar_name);
                    }
                    else
                    {
                        echo '<p><b>Ошибка! Аватар не загружен!</b></p>';       
                    }
                }
            }
        }
     }
}

// Функция показа аватарки

function showImage($dir, $avatar)
{
    echo "<img src='" . $dir . '/' . $avatar . "' alt='#'>";
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета пользователя</title>
</head>
<body>

<?php

// var_dump(getData());

$data = getData();

if($data)
{
    showProfile($data);
    uploadImage($dir);
}
else
{
    echo '<center><h1>Ошибка! Вы не заполнили все поля формы!</h1></center>'; 
}

?>
    
</body>
</html>