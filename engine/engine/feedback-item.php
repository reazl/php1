<?php
function addFeedBackGood($id)
{
    $db = getDb();
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "INSERT INTO `feedback-item` (`name`, `feedback` , `item-id`) VALUES ('{$name}', '{$message}' , '{$id}');";
    return executeQuery($sql);
}

function updateFeedBackGood()
{
    $db = getDb();
    $id = (int)$_POST["id"];
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));

    $sql = "UPDATE `feedback-item` SET `name` = '{$name}', `feedback` = '{$message}' WHERE `feedback-item`.`id` = {$id};";

    return executeQuery($sql);

}

function getOneFeedBackGood($id)
{
    $id = (int)$id;

    $sql = "SELECT * FROM `feedback-item` WHERE `id` = {$id}";

    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if (isset($news[0]))
        $result = $news[0];

    return $result;
}

function delFeedBackGoods($id)
{
    $id = (int)$id;
    $sql = "DELETE FROM `feedback-item` WHERE `id` = {$id}";
    return executeQuery($sql);
}



function getAllFeedBackGoods($id)
{

    $sql = "SELECT * FROM `feedback-item` WHERE `item-id` = {$id} ORDER BY id DESC";

    return getAssocResult($sql);
}


function doFeedBackActionImage($action, $id) {
    $params['textAction'] = "Добавить";
    $params['formAction'] = "add";

    switch ($_GET['status']) {
        case 'ok':
            $params['status'] = "Сообщение добавлено";
            break;
        case 'deleted':
            $params['status'] = "Сообщение удалено";
            break;
        case 'edited':
            $params['status'] = "Сообщение изменено";
            break;
        default:
            $params['status'] = "Оставьте отзыв";
    }

    if ($action == "add" && isset($_POST['send'])) {
        addFeedBackGood((int)$_GET['backid']);
        $backid = $_GET['backid'];
        header("Location: /image/{$backid}/?status=ok");
    }

    if ($action == "delete") {
        delFeedBackGoods($id);
        $backid = $_GET['backid'];
        header("Location: /image/{$backid}/?status=deleted");
    }

    if ($action == "edit") {
        if (isset($_POST['send'])) {
            updateFeedBackGood();
            $backid = $_GET['backid'];
            header("Location: /image/{$backid}/?status=edited");
        } else {
            $params['textAction'] = "Править";
            $params['formAction'] = "edit";
            $message = getOneFeedBackGood($id);
            $params['name'] = $message['name'];
            $params['message'] = $message['feedback'];
            $params['id'] = $message['id'];
        }

    }
    if ($action == 'edit') {
        $params['feedback'] = getAllFeedBackGoods((int)$_GET['backid']);
    } else {
        $params['feedback'] = getAllFeedBackGoods($id);
    }


    return $params;
}