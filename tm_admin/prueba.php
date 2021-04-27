<?php


$page_name = 'pagina-de-prueba';

$file = fopen("../controllers/" . $page_name . ".php", "w");
fwrite(
    $file,
    "<?php"
        . PHP_EOL . "\$page_name = '$page_name';"
        . PHP_EOL . "require 'start.php';"
);
fclose($file);
