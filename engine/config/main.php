<?php
define('SITE_TITLE', 'Урок 6');

define("TEMPLATES_DIR", "../templates/");
define("ENGINE_DIR", "../engine/");
define("LAYOUTS_DIR", "/layouts/");

define("IMAGE_DIR", "img/");
define("THUMB_DIR", "img/thumb");
define("ORIGINALS_DIR", "img/originals");

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'gallery');

include_once ENGINE_DIR . 'controller.php';
include_once ENGINE_DIR . 'db.php';
include_once ENGINE_DIR . 'images.php';
include_once ENGINE_DIR . 'news.php';
include_once ENGINE_DIR . 'render.php';
include_once ENGINE_DIR . 'feedback.php';
include_once ENGINE_DIR . 'feedback-item.php';