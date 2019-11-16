<?php
require 'connection.php';

function ImagesInsert($newUserId, $userImage)
{
    global $connect;
    try {
    $sql = "INSERT INFO images(images,userid) VALUES(:images, :userid)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':images', $userImage);
    $stmt->bindParam(':userid', $newUserId);
    $stmt->exec();
    } catch(PDOException $e){
        echo "the images failed to upload onto the database $e->getMessge()";
    }
}
   ?>