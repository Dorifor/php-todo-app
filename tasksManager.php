<?php
require_once "tasks.php";
function loadTasks(): array
{
    $db_handle = fopen("tasks.csv", "r");
    $tasks = [];
    fgetcsv($db_handle); // remove headers

    while ($db = fgetcsv($db_handle)) {
        $new_task = new Task($db[1]);
        $new_task
            ->setId($db[0])
            ->setDateCreated($db[2]);
        $tasks[] = $new_task;
    }

    fclose($db_handle);
    return $tasks;
}

function removeTask($idToRemove)
{
    $tasks = loadTasks();
    $db_handle = fopen("tasks.csv", "w");
    fputcsv($db_handle, ['id', 'label', 'date_created']);
    foreach ($tasks as $task) {
        if ($task->id === $idToRemove)
            continue;
        fputcsv($db_handle, [$task->id, $task->label, $task->date_created]);
    }
    fclose($db_handle);
}

function addTask($taskLabel) {
    $new_task = new Task(filter_var($taskLabel));
    if (!file_put_contents('tasks.csv', $new_task->getCSVString(), FILE_APPEND | LOCK_EX))
        echo 'ERROR APPENDING TO CSV';
}
