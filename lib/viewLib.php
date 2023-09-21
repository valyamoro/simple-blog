<?php

function render($controller, $action, $data) {
    if (is_array($data)) {
        extract($data);
    }
    include_once 'views/layout.php';
}