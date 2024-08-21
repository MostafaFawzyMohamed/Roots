
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();
unset($_SESSION["email"]);
// destroy the session
session_destroy();
header('Location: index.php');
?>

</body>
</html>