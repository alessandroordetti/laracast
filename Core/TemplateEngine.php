<?php

function template($viewName, $data = []) {
    $viewPath = BASE_PATH . 'views/';

    extract($data);

    $content = file_get_contents($viewPath . $viewName . '.view.php');

    /* PHP TAG */
    $content = str_replace('{{', '<?php', $content);
    $content = str_replace('}}', '?>', $content);

    /* PHP IF TAG */
    $content = preg_replace('/@if\(\s*(.+?)\s*\)\)/', '<?php if($1): ?>', $content);
    $content = str_replace('@endif', '<?php endif; ?>', $content);

    /* INCLUDE PARTIAL TAG */
    $content = preg_replace_callback('/@include\((.+?)\)/', function ($matches) use ($viewPath) {
        $partialName = trim($matches[1], "'\"");
        $partialContent = file_get_contents($viewPath . $partialName . '.view.php');
        return $partialContent;
    }, $content);

    ob_start();
    eval('?>' . $content);
    $final = ob_get_clean();
    echo $final;
}
