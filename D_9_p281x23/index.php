<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Citatopedija</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor css -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="assets/css/style.css" rel="stylesheet">



</head>

<body>

  <!--  Header  -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:info@citatopedija.com">info@citatopedija.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+381 64 123 456</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://twitter.com/najcitatii?lang=en" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/citatiizrekee/?locale=sr_RS" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/citati.zbirka/?hl=en" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.instagram.com/citati.zbirka/?hl=en" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <h1>ItBootcamp<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#portfolio">Posao</a></li>
          <li><a href="#portfolio">Zdravlje</a></li>
          <li><a href="#portfolio">Ljubav</a></li>
          <li><a href="#portfolio">Motivacija</a></li>

        </ul>
      </nav>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
 

  <!-- Hero  -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Dobro došli na <span>Citatopediju</span></h2>
          <p>Dobrodošli na našu web stranicu za citate! Naša zajednica okuplja ljubitelje inspirativnih, motivacionih i
            mudrih citata. Pružamo vam izvor inspiracije i podsticaja kroz pažljivo odabrane citate iz različitih
            oblasti života.</p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 header-picture">
          <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
              <h4 class="title"><a href="#portfolio" class="stretched-link">Posao</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-bandaid"></i></div>
              <h4 class="title"><a href="#portfolio" class="stretched-link">Zdravlje</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-arrow-through-heart"></i></div>
              <h4 class="title"><a href="#portfolio" class="stretched-link">Ljubav</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-award"></i></div>
              <h4 class="title"><a href="#portfolio" class="stretched-link">Motivacija</a></h4>
            </div>
          </div>

        </div>
      </div>
    </div>

    </div>
  </section>
  

  <main id="main">

    <!-- Carousel -->
    <section>
      <div class="container text-center" data-aos="zoom-out">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?php $first = rand(1, 4); ?>
              <img class="d-block w-100 img-fluid rounded-4 mb-4" src="assets/img/carousel/slika<?= $first ?>.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <?php $secound = rand(5, 8); ?>
              <img class="d-block w-100 img-fluid rounded-4 mb-4" src="assets/img/carousel/slika<?= $secound ?>.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <?php $third = rand(9, 13); ?>
              <img class="d-block w-100 img-fluid rounded-4 mb-4" src="assets/img/carousel/slika<?= $third ?>.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section> 


    <!-- Citati -->

    <?php

    // Pomocu funkcije citati() napravio sam biblioteku iz txt fajla gde je sve poredjano na parne br su citati neparni autori
    function citati($kategorija)
    {
      $citati = array();
      $file = "citati/$kategorija.txt";
      if (file_exists($file)) {
        $linije = file($file, FILE_IGNORE_NEW_LINES);
        for ($i = 0; $i < count($linije); $i += 2) {
          $citat = $linije[$i];
          $autor = $linije[$i + 1];
          $citati[] = $citat;
          $citati[] = $autor;
        }
      } else {
        echo "Fajl za datu kategoriju $kategorija nije pronadjen";
      }
      return $citati;
    }


    // Biblioteka Posao
    $biblioteka_posao = citati('posao');
    $posao_citat = array();
    $posao_autor = array();
    for ($i = 0; $i < count(citati('posao')); $i += 2) {
      $posao_citat[] = $i;
      $posao_autor[] = $i + 1;
    }
    // Biblioteka Zdravlje
    $biblioteka_zdravlje = citati('zdravlje');
    $zdravlje_citat = array();
    $zdravlje_autor = array();
    for ($i = 0; $i < count(citati('zdravlje')); $i += 2) {
      $zdravlje_citat[] = $i;
      $zdravlje_autor[] = $i + 1;
    }
    // Biblioteka Ljubav
    $biblioteka_ljubav = citati('ljubav');
    $ljubav_citat = array();
    $ljubav_autor = array();
    for ($i = 0; $i < count(citati('ljubav')); $i += 2) {
      $ljubav_citat[] = $i;
      $ljubav_autor[] = $i + 1;
    }
    // Biblioteka Motivacija
    $biblioteka_motivacija = citati('motivacija');
    $motivacija_citat = array();
    $motivacija_autor = array();
    for ($i = 0; $i < count(citati('motivacija')); $i += 2) {
      $motivacija_citat[] = $i;
      $motivacija_autor[] = $i + 1;
    }





    // Random broj za citate

    $prvi = rand(0, count($posao_citat) - 1);
    $drugi = rand(0, count($zdravlje_citat) - 1);
    $treci = rand(0, count($ljubav_citat) - 1);
    $cetvrti = rand(0, count($motivacija_citat) - 1);


    // Random filter za prikaz prvog citata

    $filter = array('.filter-posao', '.filter-zdravlje', '.filter-ljubav', '.filter-motivacija');
    $rand_filter = rand(0, count($filter) - 1);

    ?>
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Citati</h2>

        </div>

        <div class="portfolio-isotope" data-portfolio-filter="<?= $filter[$rand_filter]; ?>" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">Svi</li>
              <li data-filter=".filter-posao">Posao</li>
              <li data-filter=".filter-zdravlje">Zdravlje</li>
              <li data-filter=".filter-ljubav">Ljubav</li>
              <li data-filter=".filter-motivacija">Motivacija</li>
            </ul>
          </div>

          <div class="row gy-4 portfolio-container">

            <div class="col-xl-12 col-md-12 portfolio-item filter-posao">
              <div class="portfolio-wrap">

                <div class="portfolio-info">
                  <h4><?= $biblioteka_posao[$posao_citat[$prvi]]; ?></h4>
                  <p><?= $biblioteka_posao[$posao_autor[$prvi]] ?></p>
                </div>
              </div>
            </div>

            <div class="col-xl-12 col-md-12 portfolio-item filter-zdravlje">
              <div class="portfolio-wrap">

                <div class="portfolio-info">
                  <h4><?= $biblioteka_zdravlje[$zdravlje_citat[$drugi]]; ?></h4>
                  <p><?= $biblioteka_zdravlje[$zdravlje_autor[$drugi]] ?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 portfolio-item filter-ljubav">
              <div class="portfolio-wrap">

                <div class="portfolio-info">
                  <h4><?= $biblioteka_ljubav[$ljubav_citat[$treci]]; ?></h4>
                  <p><?= $biblioteka_ljubav[$ljubav_autor[$treci]] ?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 portfolio-item filter-motivacija">
              <div class="portfolio-wrap">

                <div class="portfolio-info">
                  <h4><?= $biblioteka_motivacija[$motivacija_citat[$cetvrti]]; ?></h4>
                  <p><?= $biblioteka_motivacija[$motivacija_autor[$cetvrti]] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <!--  O nama  -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>O nama</h2>
          <p>Dobrodošli na našu stranicu posvećenu citatima! Naš cilj je da vam pružimo inspiraciju, motivaciju i dublji uvid kroz moćne reči koje su izgovorene od strane mudrih ljudi iz različitih sfera života.</p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-12 about-us ">
            <h3>"Uspjeh dolazi iz hrabrosti da se započne, strpljenja da se istraje i strasti da se nikada ne odustane." - John C. Maxwell</h3>
            <img src="assets/img/breadcrumbs-bg.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p style="text-indent:20px;">            
              Naša stranica je mesto gde možete pronaći širok spektar citata koji se bave temama poput posla, zdravlja, ljubavi i motivacije. Svi citati su pažljivo odabrani kako bismo vam pružili inspirativno iskustvo i podstakli pozitivne promene u vašem životu.</p>

              Naš tim strastvenih istraživača i zaljubljenika u mudrost i inspiraciju radi naporno kako bi vam pružio najbolje citate iz knjiga, govora, filmova i drugih izvora. Trudimo se da svakodnevno osvežavamo našu kolekciju citata kako biste uvek imali novo iskustvo i otkrili nešto što će vas motivisati ili vas inspirisati na duboko razmišljanje.</p>

              Uz to, imamo i mogućnost filtriranja citata po kategorijama kako biste lakše pronašli ono što vas zanima. Bilo da tražite motivaciju za svoj posao, savete za očuvanje zdravlja, inspiraciju za ljubavne veze ili jednostavno želite da se podsetite važnosti motivacije u životu, naša stranica ima sve to i još mnogo toga.</p>
              <p>
              Hvala vam što ste deo naše zajednice citata. Nadamo se da ćete pronaći inspiraciju i motivaciju koju tražite i da ćete se redovno vraćati kako biste otkrili nove dragocenosti reči koje će vas inspirisati i podstaknuti na rast i razvoj.</p>

              Vaša strastvena ekipa za citate.</p>
          </div>
        </div>
      </div>
    </section>
  </main>



  <!-- Footer  -->

  <?php

  date_default_timezone_set('Europe/Belgrade');
  $time = date('H-i-s');
  $datum = date('d/m/Y');


  ?>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-6 col-sm-6 footer-contact text-center text-md-start">
          <h4>Trenutno vreme : <?= $time ?></h4>
        </div>
        <div class="col-6 col-sm-6 text-center text-md-end">
          <h4>Dan : <?= $datum ?></h4>
        </div>
      </div>
    </div>
  </footer>
  

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!--Dodatne ekstenzije za caorutel-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

  <!--Ovde sam stavio linkove za Carousel da se menjaju slike -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!--End Dodatne ekstenzije za caorutel-->

</body>

</html>