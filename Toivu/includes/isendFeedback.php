<?php
    //Tiedot kantaan
    $data['userID'] = $_SESSION['suserID'];
    $data['title'] = $_POST['givenFeedTitle'];
    $data['fmessage'] = $_POST['givenFeedMessage'];
    $data['rating'] = $_POST['givenRating'];

    try {
        $STH = $DBH->prepare("INSERT INTO wsk21_toivu_feedback (userID, userID, feedTitle, feedMessage, feedRating) VALUES (:userID, :title, :fmessage, :rating);");
        $STH -> execute($data);
        header("Location: userSettings.php"); //Vie takaisin asetussivulle
    } 
    catch (PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'userSettings.php: '.$e -> getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Ongelma tietokannassa';
    }
?>