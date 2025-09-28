<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tasks</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
require_once "tasksManager.php";
require_once 'requestsHandler.php';
handleRequest();
$tasks = loadTasks();
?>

<body>
    <h1>Tasks</h1>
    <form action="" method="post" class="tasks">
        <? foreach ($tasks as $task) { ?>
            <div class="task">
                <p><? echo $task->label ?></p>
                <button name="remove" value="<? echo $task->id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                </button>
            </div>
        <?php } ?>
    </form>
    <form action="" method="post">
        <div class="task add">
            <input type="text" name="new" autofocus required autocomplete="off">
            <button type="submit" name="add">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
            </button>
        </div>
        <!-- <button name="cancel">Cancel</button>
        <button name="save">Save</button> -->
    </form>
</body>

</html>