<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo park - Event</title>

    <?php include 'layout-header.php'; ?>


</head>

<body>
    <?php
    $active_page = 'events';

    include 'nav.php';
    ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Upcomming Events</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">

            <?php
            include 'models/Event.php';
            include 'utility.php';

            $events = (new Event())->get_upcomming_events();

            foreach ($events as $event):
                ?>
                <!-- First Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo './uploads/' . $event->get_event_image(); ?>" class="card-img-top"
                            style="max-height:250px" alt="Item 1 Image">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $event->get_name() ?></h5>
                            <p class="card-text"><?php echo $event->get_short_text_from_event_text() ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</body>

</html>