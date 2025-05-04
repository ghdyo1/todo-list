<?php
require_once "db-config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $task = trim($_POST["task"]);
    $task_id = $_POST["page-id"];

    if(empty($task)){
        header("Location: index.php?id=" . $task_id);
    }

    $sql = "INSERT INTO task (name, task_type, completed) VALUES (:name, :task_type, 0)";
    $query = $conn->prepare($sql);
    $query->bindParam(":name", $task);
    $query->bindParam(":task_type", $task_id);
    $query->execute();

    header("Location: index.php?id=" . $task_id);

}
else{
    header("Location: index.php");
}
?>