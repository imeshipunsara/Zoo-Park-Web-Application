<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about us</title>
  <?php include 'layout-header.php'; ?>
  <!-- <link rel="stylesheet" href="assets/styles/aboutus.css"> -->
  <link rel="stylesheet" href="assets/styles/about.css">
</head>

<body>
  <?php
  $active_page = 'about-us';
  include 'nav.php';
  ?>

  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/deer.jpg" class="d-block mx-auto" style="width: 100%; height: 500px;" alt="Deer">
      </div>
      <div class="carousel-item">
        <img src="assets/images/sloth.jpg" class="d-block mx-auto" style="width: 100%; height: 500px;" alt="Sloth">
      </div>
      <div class="carousel-item">
        <img src="assets/images/wadura.jpg" class="d-block mx-auto" style="width: 100%; height: 500px;" alt="Wadura">
      </div>
    </div>
  </div>

  <div class="aboutzoo">
    <h1>About zoo parc</h1>
    <p>ZooParc Zoological Park, a premier destination for wildlife conservation and education. Spanning 70 hectares, ZooParc is home to over 2,000 animals representing
      200 unique species from around the globe. Our park is dedicated to creating a harmonious balance between wildlife protection,
      public education, and the visitor experience. Whether you’re here to learn, volunteer, or simply enjoy nature, ZooParc offers a
      one-of-a-kind opportunity to connect with the animal kingdom.</p>
  </div>

  <div class="aboutzoo">
    <h1>History Of the Zoo Parc</h1>
    <p>Since its founding, ZooParc has grown into a world-class zoological park. Our journey began with a vision to protect endangered species and educate the public about the importance of wildlife conservation.
      Over the years, ZooParc has expanded its collection, providing spacious and naturalistic habitats for some of the world's most endangered species, including our famous giant pandas, lions, Asian elephants, and bald eagles</p>
  </div>
  <div class="aboutzoo">
    <h1>feauter Plans</h1>
    <p>As we look to the future, ZooParc remains committed to expanding our role in wildlife conservation and education. Our upcoming projects include</p>
    <p>New Habitats: The addition of cutting-edge habitats designed to replicate the natural environments of endangered species. <br>
      Sustainability Initiatives: Implementation of green energy solutions and eco-friendly practices throughout the park to reduce our environmental impact. <br>
      Digital Expansion: Enhancing our online presence with virtual tours, interactive educational content, and an expanded membership forum to engage a global audience. <br> 
    </p>
  </div>

  


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/front.avif" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Volenteer Oppotuniteis</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Opportunities for Educational Information</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>
  </div>


<br><br><br><br><br><br><br>

  <?php include 'layout-footer.php' ?>
</body>

</html>