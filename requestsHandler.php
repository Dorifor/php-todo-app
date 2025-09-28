<?php

function handleRequest() {
    $is_remove = key_exists('remove', $_POST);
    $is_cancel = key_exists('cancel', $_POST);
    $is_save = key_exists('save', $_POST);
    $is_add = key_exists('add', $_POST);

    if ($is_remove) {
        removeTask($_POST['remove']);
        return;
    }

    if ($is_cancel) {
        return;
    }

    if ($is_save) {
    }

    if ($is_add) {
        addTask($_POST['new']);
    }
}