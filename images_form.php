<?php
require_once 'images_checker.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>upload images</title>
   </head>
   <body>
      <div class="container">
      <div class="add-form">
         <h3>Upload images</h3>
         <form action="images_form.php" method="post" enctype="multipart/form-data">
         <input type="file" name="profile" value="" placeholder=""><br>
         <button type="submit" name="btn-add">Add New</button>
         </form>
      </div>
   </body>
</html>