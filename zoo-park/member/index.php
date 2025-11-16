<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo park - Member Panel</title>

    <?php include '../layout-header.php'; ?>


</head>

<body>

    <?php
    session_start();

    if (isset($_SESSION['IS_MEMBER_LOGGED_IN']) && $_SESSION['IS_MEMBER_LOGGED_IN'] == true) {
        include './member-dashboard.php';
    } else {
        header('Location: ' . $APP_BASE_PATH . '/member/member-logout.php');
    }

    ?>





</body>

</html>