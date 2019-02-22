<?php


function prepareVariables($page, $action, $id){
    $params = [];
    switch ($page) {
        case 'index':
            break;

        case 'news':
            $params['news'] = getNews();
            $params['title'] = 'Новости';
            break;

        case 'newspage':
            $content = getNewsContent($_GET['id']);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            $params['title'] = 'Новость '. $_GET['id'];
            break;

        case 'gallery':

            if (isset($_GET['message'])){
                switch((int)$_GET['message']){
                    case 1: $message = "File uploaded";
                        break;
                    case 0: $message = "Error upload";
                        break;
                    default: $message = '';
                }
            }

            $params = [
                'message' => $message,
                'images' => getImages(),
                'title' => 'Галерея'
            ];
            break;

        case "image":
            //получаем индекс изображения
            $id = (int)$id;

            //подготовим переменные для шаблона
            $image = getImage($id);
            $params['image'] = $image['filename'];
            $params['likes'] = $image['likes'];
            $params['id'] = $image['idx'];
            $params['title'] = 'Изображение '. $image['filename'];

            break;

        case 'addlike':
            $id = (int)$_POST['id'];
            addLucas($id);
            $image = getImage($id);
            $params['likes'] = $image['likes'];
            $params['is_ajax'] = true;

            break;
    }
    return $params;
}
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

function uploadImage(){

        $filename = basename($_FILES['new-file']['name']);
        $uploadfile = ORIGINALS_DIR . '/' . $filename;

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
            $image->save2DB($filename);
            $message = 1;
        } else {
            $message = 2;
        }
header("Location: ?page=gallery&message={$message}");


}

function getNews(){
    $sql = "SELECT `id`,`prev` FROM news";
    $news = getAssocResult($sql);
   // var_dump($news);
    return $news;
}

function getNewsContent($id){
    $id = (int)$id;

    $sql = "SELECT * FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];
    return $result;
}

function render($page, $params = [], $title){
    if (!$params['is_ajax']) {
        return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu', $params),
            'title' => SITE_TITLE . " - " . $params['title']
        ]);
    } else {

        return json_encode($params);
    }

}


function renderTemplate($page, $params = []){
    ob_start();
    if (!is_null($params)) {
        extract($params);
    }
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        echo $fileName;
        Die('Страницы не существует 404');
    }
    return ob_get_clean();
}