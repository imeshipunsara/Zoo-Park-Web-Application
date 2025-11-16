<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo park</title>
    <link rel="stylesheet" href="assets/styles/mystyle.css">
    <?php include 'layout-header.php'; ?>


</head>

<body>
    <?php
    $active_page = 'home';
    include 'nav.php';
    ?>

    <div class="home-header">
        Welcome to <br>
        Zoo Parc
    </div>


    <div class="hmtxt">
        <p>ZooParc Zoological Park is a sprawling wildlife sanctuary covering 70 hectares, home to 2,000 animals from 200 different species.
            Our diverse habitats offer an immersive experience to learn about animals ranging from majestic lions and bald eagles to rare
            species like the giant pandas and Asian elephants.
            ZooParc is dedicated to both conservation and education,
            offering visitors unique opportunities to connect with wildlife and support animal care initiatives
        </p>
    </div>

    <section class="animals">
        <div>
            <h2>Animals</h2>
        </div>
        <div class="aniCards">
            <div class="Acard">
                <img src="assets/images/mam.avif" alt="">
                <h3>Mammals</h3>
                <p>This categorization includes a mix of popular mammals from different habitats,
                    offering variety and educational value for zoo visitors</p>
                <a href="animals.php#mam" class="btn-read">Read More</a>
            </div>
            <div class="Acard">
                <img src="assets/images/duck.avif" alt="">
                <h3>Birds</h3>
                <p>This provides a broad selection of bird species,
                    ranging from flightless birds to predatory birds and colorful, exotic species, creating variety and interest for zoo visitors.</p>
                <a href="animals.php#bid" class="btn-read">Read More</a>
            </div>
            <div class="Acard">
                <img src="assets/images/frog.jpg" alt="">
                <h3>Amphibians</h3>
                <p>This list includes a variety of amphibians with diverse appearances and behaviors,
                    offering educational opportunities for visitors to learn about their unique life cycles and adaptations.</p>
                <a href="animals.php#ambi" class="btn-read">Read More</a>
            </div>
            <div class="Acard">
                <img src="assets/images/snake.avif" alt="">
                <h3>Reptiles</h3>
                <p>This list covers a variety of reptiles, ranging from large,
                    dangerous predators to slow-moving herbivores, giving visitors a diverse experience with these fascinating animals.</p>
                <a href="animals.php#rep" class="btn-read">Read More</a>
            </div>
            <div class="Acard">
                <img src="assets/images/fish.jpg" alt="">
                <h3>aquatic animals</h3>
                <p>This list includes a range of aquatic species from different habitats,
                    creating a comprehensive and exciting experience for zoo visitors interested in marine life.</p>
                <a href="animals.php#aqua" class="btn-read">Read More</a>
            </div>
            <div>
                <img src="assets/images/panda 2.avif" alt="">
                <h3>giant Panda</h3>
                <p>This list includes a range of aquatic species from different habitats,<br>
                    creating a comprehensive and exciting experience for zoo visitors interested in marine life.</p>
                <a href="animals.php#pan" class="btn-read">Read More</a>
            </div>
        </div>
    </section>
    <br>


    <br><br><br>

    <section class="regi">
        <h1>Become a Member</h1>
        <p>Join our online community to contribute towards wildlife education and animal care at ZooParc.
            Volunteers can register for the membership forum by filling out a simple form with required personal details.
            As a member, you will gain access to special events, educational content, and exclusive opportunities to assist with caring for our animals and habitats.
        </p><br>
        <a href="join-us.php" class="btn-regi">Membership</a>
    </section>

    
    















    <?php include 'layout-footer.php' ?>
</body>

</html>