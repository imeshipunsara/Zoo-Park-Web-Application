<?php

if (!isset($_GET['manage'])) {

    header('Location: ' . $APP_BASE_PATH . '/member-dashboard.php?manage=edu_informations');
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zoo park member panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a href="zoo-master?manage=edu_informations" class="nav-link <?php
                    echo $_GET['manage'] == 'edu_informations' ? 'active' : '';
                    ?>">Educational Informations</a>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <?php
                        echo $_SESSION['MEMBER_USERNAME']
                            ?>
                    </a>

                </li>
            </ul>
            <form class="d-flex" action="member/member-logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div>
    <div style="padding:16px;">
        <?php
        if ($_GET['manage'] == 'edu_informations') {
            include '../zoo-master/manage/edu_informations.php';
        } else {

        }
        ?>
    </div>