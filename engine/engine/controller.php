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
            if (isset($_GET['sort'])) {

                $field = $_GET['sort'];
                $direct = $_GET['direct'];
                if ($_GET['sort'] == "feedback") {
                    $params = [
                        'message' => $message,
                        'title' => 'Галерея',
                        'images' => imgByFB($direct)
                    ];
                } else {
                    $params = [
                        'message' => $message,
                        'title' => 'Галерея',
                        'images' => getImages($field, $direct),
                    ];
                }} else {
                $field = 'likes';
                $direct = 'desc';
                $params = [
                    'message' => $message,
                    'images' => getImages($field, $direct),
                    'title' => 'Галерея'
                ];
            }
            break;

        case "image":
            //получаем индекс изображения

            if ($action != 'edit') {
                $id = (int)$id;
                $params = doFeedbackActionImage($action, $id);
            } else {

                $params = doFeedbackActionImage($action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];

            }
            //подготовим переменные для шаблона
            $image = getImage($id);
            $params['image'] = $image['filename'];
            $params['likes'] = $image['likes'];
            $params['id'] = $image['idx'];
            $params['describe'] = $image['describes'];
            $params['price'] = $image['price'];
            $params['title'] = 'Изображение '. $image['filename'];

            break;

        case 'addlike':
            $id = (int)$_POST['id'];
            addLucas($id);
            $image = getImage($id);
            $params['likes'] = $image['likes'];
            $params['is_ajax'] = true;

            break;

        case "feedback":

            $params = doFeedBackAction($action, $id);

            break;
    }
    return $params;
}


