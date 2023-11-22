<?php 

function template($viewName, $data = []){
    $viewPath = BASE_PATH . 'views/';

    extract($data);

    $content = file_get_contents($viewPath . $viewName . '.view.php');

    /* PHP TAG */
    $content = str_replace('{{', '<?php', $content);
    $content = str_replace('}}', '?>', $content);

    /* PHP IF TAG */
    $content = preg_replace('/@if\(\s*(.+?)\s*\)\)/', '<?php if($1): ?>', $content);
    $content = str_replace('@endif', '<?php endif; ?>', $content);

    ob_start();
    eval('?>'.$content);
    $final = ob_get_clean();
    echo $final;
}

$data = [
    'name' => 'Alessandro'
];

