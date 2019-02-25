<?php
function addLucas($id){
    $sql = "UPDATE `images` SET `likes` = `likes` + 1 WHERE `idx` = {$id}";
    executeQuery($sql);
}

function getImage($id){
    $sql = "SELECT * FROM images WHERE `idx` = {$id}";
    $images = getAssocResult($sql);
    //var_dump($images);
    return $images[0];
}

function getImages(){
    $sql = "SELECT * FROM images ORDER BY likes DESC";
    $images = getAssocResult($sql);
    //var_dump($images);
    return $images;
}

function save2DB($filename, $describe, $price){
    $sql = "INSERT INTO `images` (`filename`, `likes`, `describes`, `price`) VALUES (\"$filename\", '0', \"$describe\", $price)";
    $result = executeQuery($sql);
    return $result;
}

function uploadImage(){

    $filename = basename($_FILES['new-file']['name']);
    $uploadfile = ORIGINALS_DIR . '/' . $filename;
    $describe = $_POST["describe"];
    $price = (int)$_POST['price'];

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
        save2DB($filename, $describe, $price);
        $message = 1;
    } else {
        $message = 2;
    }
    header("Location: ?page=gallery&message={$message}");
}