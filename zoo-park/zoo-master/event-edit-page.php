<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../layout-header.php'; ?>
    <?php
    session_start();

    include '../models/Event.php';
    include '../utility.php';

    if (!isset($_SESSION['IS_ADMIN_LOGGED_IN']) || $_SESSION['IS_ADMIN_LOGGED_IN'] == false) {
        // redirect to login page
        header('Location: ' . $APP_BASE_PATH . '/zoo-master/zoo-master-login-page.php');
    }
    $event = new Event();

    $is_edit = false;




    if (isset($_GET['event_id'])) {
        $event = $event->get_event_by_id($_GET['event_id']);
        if ($event) {
            $is_edit = true;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $event->set_name($_POST['name']);
            $event->set_event_text($_POST['event_text']);
            $event->set_event_datetime($_POST['event_datetime']);

            $old_event_image = null;
            if (isset($_FILES['EventPhoto']) && $_FILES['EventPhoto']['name'] != null) {

                $upload_result = uploadFile('EventPhoto');
                if ($upload_result['uploadOk'] == 1 && $upload_result['error'] == null) {

                    $old_event_image = $event->get_event_image();
                    $event->set_event_image($upload_result['file_name']);
                } else {
                    throw new Exception($upload_result['error']);
                }
            }

            if ($is_edit) {
                $event->update_event();
            } else {
                $event->create_event();
            }

            if ($old_event_image != null) {
                deleteOldImage($old_event_image);
            }

            header('Location: ' . $APP_BASE_DOMAIN . $APP_BASE_PATH . '/zoo-master?manage=events');

        } catch (Exception $ex) {
            echo "<p class='error-message'>" . $ex->getMessage() . "</p>";
        }
    }

    ?>

    <title>Zoo park - <?php
    if ($is_edit) {
        echo "Edit ";
    } else {
        echo "Create New ";
    }
    ?> Event</title>
</head>

<body>

    <div class="container mt-5">
        <h2>
            <?php
            if ($is_edit) {
                echo "Edit ";
            } else {
                echo "Create New ";
            }
            ?>
            Event
        </h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $event->get_event_id(); ?>">


            <div class="form-group">
                <label for="name">Event Name:</label>
                <input type="text" class="form-control" value="<?php echo $event->get_name(); ?>" id="name" name="name"
                    placeholder="Enter event name" required>
            </div>
            <div class="form-group">
                <label for="text">Event Description:</label>
                <textarea class="form-control" id="text" name="event_text" rows="3"
                    placeholder="Enter event description"><?php echo $event->get_event_text(); ?></textarea>
            </div>
            <div class="form-group col-md-2">
                <label for="event_datetime">Event Date & Time:</label>
                <input type="datetime-local" class="form-control" id="event_datetime"
                    value="<?php echo $event->get_event_datetime(); ?>" name="event_datetime" required>
            </div>
            <div class="form-group mt-1">
                <label for="exampleFormControlFile1">Event Photo:</label>
                <input type="file" class="form-control-file" name="EventPhoto" id="exampleFormControlFile1">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <?php
                    if ($is_edit) {
                        echo "Save ";
                    } else {
                        echo "Create ";
                    }
                    ?>
                    Event</button>
                <a href="<?php echo $APP_BASE_PATH . '/zoo-master?manage=events' ?>" class="btn btn-danger">Cancel</a>
            </div>

        </form>
    </div>
</body>

</html>