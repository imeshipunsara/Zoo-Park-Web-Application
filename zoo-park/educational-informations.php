<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo park - Educational Informations</title>

    <?php include 'layout-header.php'; ?>


</head>

<body>
    <?php
    $active_page = 'educational-informations';

    include 'nav.php';
    ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Educational Informations</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">

            <?php
            include 'models/EducationalInformation.php';
            include 'utility.php';

            $informations = (new EdicationalInformation())->get_all_informations();

            foreach ($informations as $information):
                ?>
                <!-- First Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo './uploads/' . $information->get_cover_image(); ?>" class="card-img-top"
                            style="max-height:250px" alt="Item 1 Image">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $information->get_name() ?></h5>
                            <p class="card-text"><?php echo $information->get_short_text_from_information_text() ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</body>

</html>