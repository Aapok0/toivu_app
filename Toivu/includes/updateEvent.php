<?php
    if(isset($_POST["id"])) {
        $query = "UPDATE wsk21_toivu_calendar SET calEvent=:title, calMood=:mood, calStart=:start_event, calEnd=:end_event WHERE calID=:id, userID=:user";
        $stmt = $DBH -> prepare($query);
        $stmt -> execute(
            array(
                ':title' => $_POST['title'],
                ':mood' => $_POST['mood'],
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end'],
                ':id' => $_POST['id'],
                ':user' => $_SESSION['suserID']
            )
        );
    }
?>