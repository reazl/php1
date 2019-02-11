<?
if(isset($_POST['upload'])) {



    $uploaddir = 'img/originals/'; // Relative path under webroot
    $filename = basename($_FILES['new-file']['name']);
    $uploadfile = $uploaddir . $filename;



//Проверка существует ли файл
    if (file_exists($uploadfile)) {
        echo "<br>Файл $uploadfile существует, выберите другое имя файла!";
        exit;
    }

//Проверка на размер файла 
    if ($_FILES["new-file"]["size"] > 1024 * 1 * 1024) {
        echo("Размер файла не больше 5 мб");
        exit;
    }
//Проверка расширения файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['new-file']['name'])) {
            echo "Загрузка php-файлов запрещена!";
            exit;
        }
    }
//Проверка на тип файла
    $imageinfo = getimagesize($_FILES['new-file']['tmp_name']);
    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
        exit;
    }

    if ($_FILES['new-file']['type'] != "image/jpeg") {
        echo "Можно загружать только jpg-файлы.";
        exit;
    }

    if (move_uploaded_file($_FILES['new-file']['tmp_name'], $uploadfile)) {
        include('simpleImage.php');
        $image = new SimpleImage();
        $image->load($uploadfile);
        $image->resize(400, 200);
        $image->save('img/thumb/', $filename);
        echo "Файл успешно загружен.\n";
    } else {
        echo "Загрузка не получилась.\n";
    }
}
?>

