<?php
require_once "db-config.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
else{
    $id="1";
}
$sql = "SELECT * FROM task WHERE task_type = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();
$tasks = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>туду</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"><img src="logo.svg"></div>
        <div class="tabs">
            <div class="tab active">Personal</div>
            <div class="tab">Professional</div>
        </div>
    </header>
    <main>
        <div class="add">
            <form action="add.php" method="POST">
                <input id="task" name="task" type="text" placeholder="What do you need to do?" required>
                <input type="text" value=<?= $id ?> name="page-id" hidden>
                <input type="submit" value="ADD">
            </form>
        </div>
        <div class="list">
            <div class="tasks">
                <?php
                foreach($tasks as $task){
                    if($task["completed"]==0){
                        $image="not-completed";
                    }
                    else{
                        $image="completed";
                    }
                    echo "<div class='task'>
                        <img class='completion-image' src='".$image.".svg'>
                        <p>".$task["name"]."</p>
                        <img class='delete-icon' src='delete.svg'>
                    </div>";
                }
                ?>
            </div>
            <div class="clear"></div>
        </div>
    </main>
</body>
</html>