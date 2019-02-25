<?php

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