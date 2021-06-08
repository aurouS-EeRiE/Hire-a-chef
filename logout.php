<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    session_unset();
    session_destroy();
    echo '<script>alert("Logged out!");window.location.href="home.php";</script>';
    ?>
</body>

</html>