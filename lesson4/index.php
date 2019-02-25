<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });	}); </script>

</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
       <?
       require_once 'functions/gallery.php';
       ?>

        <form method="POST" enctype="multipart/form-data">
            <p>Загрузить новое изображение в галерею:</p>
            <input type="file" name="new-file">
            <input type="submit" value="Загрузить" name="upload">
        </form>
        <?php
        include_once 'functions/upload.php';
        ?>

    </div>
</div>

</body>
</html>