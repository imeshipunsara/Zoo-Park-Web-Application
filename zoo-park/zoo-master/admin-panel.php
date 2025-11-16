<?php

if (!isset($_GET['manage'])) {

    header('Location: ' . $APP_BASE_PATH . '/zoo-master?manage=events');
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Zoo park admin panel</a>

        <!-- Navbar Toggler (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="zoo-master?manage=events" class="nav-link <?php
                    echo $_GET['manage'] == 'events' ? 'active' : ' ';
                    ?>">Events</a>
                </li>
                <li class="nav-item">
                    <a href="zoo-master?manage=edu_informations" class="nav-link <?php
                    echo $_GET['manage'] == 'edu_informations' ? 'active' : '';
                    ?>">Educational Informations</a>
                </li>
                <li class="nav-item">
                    <a href="zoo-master?manage=community_members" class="nav-link <?php
                    echo $_GET['manage'] == 'community_members' ? 'active' : '';
                    ?>">Community Members</a>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <?php
                        echo $_SESSION['ADMIN_USERNAME']
                            ?>
                    </a>

                </li>
            </ul>

            <!-- Logout Button (on the right side) -->
            <form class="d-flex" action="zoo-master/logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div>
    <div style="padding:16px;">
        <?php
        if ($_GET['manage'] == 'events') {
            include './manage/events.php';
        } else if ($_GET['manage'] == 'edu_informations') {
            include './manage/edu_informations.php';
        } else if ($_GET['manage'] == 'community_members') {
            include './manage/community_members.php';
        }
        ?>
    </div>