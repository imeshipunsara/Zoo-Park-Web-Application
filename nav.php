<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zoo Parc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'home' ? 'active' : ''; ?>" aria-current="page"
                        href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'about-us' ? 'active' : ''; ?>"
                        href="about-us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'plan-your-visit' ? 'active' : ''; ?>"
                        href="plan-your-visit.php">Plan your Visit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'events' ? 'active' : ''; ?>"
                        href="events-list.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'educational-informations' ? 'active' : ''; ?>"
                        href="educational-informations.php">Educational Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_page == 'join-us' ? 'active' : ''; ?>" href="join-us.php">Join
                        Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>