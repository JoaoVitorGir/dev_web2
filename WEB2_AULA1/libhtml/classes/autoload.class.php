<?php
spl_autoload_register(function($className) {
    $file = $_SERVER["DOCUMENT_ROOT"].'/dev_web2/WEB2_AULA1/libhtml/classes/' . $className . '.class.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

?>
 