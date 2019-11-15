<?php
require_once 'checker.php';
?>

<!DOCTYPE html>
<head>
<meta lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Password Message</title>
</head>
<body>
<div class="recovery_mess">
<p>A link has been send to your email  <?php echo $_SESSION['email'] ?> to verify your password</p>
</div>
</body>
</html>