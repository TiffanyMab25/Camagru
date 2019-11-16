<?php
require_once 'connection.php';
$connect = "";

?>
<?php
require 'connection.php';

function ImagesInsert($newUserId, $userImage)
{
    global $connect;
    try {
    $sql = "INSERT INFO images(images,userid) VALUES(:images, :userid)";
    $stmt = $connect-. 
    }
}

   ?>