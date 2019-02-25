<?php



echo renderTemplate('home', renderTemplate('about'), renderTemplate('footer'));

function renderTemplate($page, $content = '', $footer = ''){
ob_start();
$filename = './pages/'. $page . '.php';
if (file_exists($filename)) {
    include $filename;
}else{
    Die('Error 404');
}

return ob_get_clean();
}