<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="src/img/favicon.png" type="image/png">

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="src/css/swiper-bundle.min.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="src/css/styles.css">

  <title>Parc national des calanques</title>
</head>

<body>
  <header class="header" id="header">
    <?php include "./../views/navbar/navbarHome.php"; ?>
  </header>

  <main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
      <img src="src/img/img-hero.png" alt="" class="home__img">

      <div class="home__container container grid">
        <div class="home__data">
          <span class="home__data-subtitle">Découvrez</span>
          <h1 class="home__data-title">Explorer <br> les plus belles <b>calanques <br> de Marseille.</b></h1>

        </div>

        <div class="home__social">
          <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
            <i class="ri-facebook-box-fill"></i>
          </a>
          <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
            <i class="ri-instagram-fill"></i>
          </a>
          <a href="https://twitter.com/" target="_blank" class="home__social-link">
            <i class="ri-twitter-fill"></i>
          </a>
        </div>

        <div class="home__info">
          <div>
            <span class="home__info-title">Ces magnifiques destinations n'attendent que vous!</span>
          </div>

          <div class="home__info-overlay">
            <img src="src/img/home2.jpg" alt="" class="home__info-img">
          </div>
        </div>
      </div>
    </section>

    <!--==================== ABOUT ====================-->
    <section class="about section" id="about">
      <div class="about__container container grid">
        <div class="about__data">
          <h2 class="section__title about__title">Plus d'informations <br> À propos des meilleures plages</h2>
          <p class="about__description">Vous pouvez trouver les endroits les plus beaux et les plus agréables aux
            meilleurs
            prix avec des remises spéciales, vous choisissez l'endroit, nous vous guiderons tout au long du chemin pour
            attendre, obtenez votre
            place maintenant.
          </p>
          <a href="#" class="button">Réserver une place</a>
        </div>

        <div class="about__img">
          <div class="about__img-overlay">
            <img src="src/img/about1.jpg" alt="" class="about__img-one">
          </div>

          <div class="about__img-overlay">
            <img src="src/img/about2.jpg" alt="" class="about__img-two">
          </div>
        </div>
      </div>
    </section>

    <!--==================== DISCOVER ====================-->
    <section class="discover section" id="discover">
      <h2 class="section__title">Découvrez les endroits <br> les plus
        attrayants</h2>

      <div class="discover__container container swiper-container">
        <div class="swiper-wrapper">
          <!--==================== DISCOVER 1 ====================-->
          <div class="discover__card swiper-slide">
            <img src="src/img/discover1.jpg" alt="" class="discover__img">
            <div class="discover__data">
              <h2 class="discover__title">Le tour de l’île de Ratonneau</h2>
              <span class="discover__description">24 tours available</span>
            </div>
          </div>

          <!--==================== DISCOVER 2 ====================-->
          <div class="discover__card swiper-slide">
            <img src="src/img/discover2.jpg" alt="" class="discover__img">
            <div class="discover__data">
              <h2 class="discover__title">Le sentier du Président</h2>
              <span class="discover__description">15 tours available</span>
            </div>
          </div>

          <!--==================== DISCOVER 3 ====================-->
          <div class="discover__card swiper-slide">
            <img src="src/img/discover3.jpg" alt="" class="discover__img">
            <div class="discover__data">
              <h2 class="discover__title">L’ascension du sommet de Béouveyre
              </h2>
              <span class="discover__description">18 tours available</span>
            </div>
          </div>

          <!--==================== DISCOVER 4 ====================-->
          <div class="discover__card swiper-slide">
            <img src="src/img/discover4.jpg" alt="" class="discover__img">
            <div class="discover__data">
              <h2 class="discover__title">La fontaine de Voire</h2>
              <span class="discover__description">32 tours available</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--==================== EXPERIENCE ====================-->
    <section class="experience section">
      <h2 class="section__title">Avec notre expérience <br> Nous vous servirons</h2>

      <div class="experience__container container grid">
        <div class="experience__content grid">
          <div class="experience__data">
            <h2 class="experience__number">20</h2>
            <span class="experience__description">Années <br> d'Expérience</span>
          </div>

          <div class="experience__data">
            <h2 class="experience__number">75</h2>
            <span class="experience__description">Visites <br> Complètes</span>
          </div>

          <div class="experience__data">
            <h2 class="experience__number">650+</h2>
            <span class="experience__description">Destinations <br> Touristiques</span>
          </div>
        </div>

        <div class="experience__img grid">
          <div class="experience__overlay">
            <img src="src/img/experience1.jpg" alt="" class="experience__img-one">
          </div>

          <div class="experience__overlay">
            <img src="src/img/experience2.jpg" alt="" class="experience__img-two">
          </div>
        </div>
      </div>
    </section>

    <!--==================== VIDEO ====================-->
    <section class="video section">
      <h2 class="section__title">Visite guidée en vidéo</h2>

      <div class="video__container container">
        <p class="video__description">Découvrez avec notre vidéo les endroits les plus beaux et les plus agréables pour
          vous et votre famille.
        </p>

        <div class="video__content">
          <video id="video-file">
            <source src="src/video/video.webm" type="video/mp4">
          </video>

          <button class="button button--flex video__button" id="video-button">
            <i class="ri-play-line video__button-icon" id="video-icon"></i>
          </button>
        </div>
      </div>
    </section>

    <!--==================== SUBSCRIBE ====================-->
    <section class="subscribe section">
      <div class="subscribe__bg">
        <div class="subscribe__container container">
          <h2 class="section__title subscribe__title">Abonnez-vous à notre <br> Newsletter</h2>
          <p class="subscribe__description">Abonnez-vous à notre newsletter et bénéficiez d'une
            réduction spéciale de 30%.
          </p>

          <form action="" class="subscribe__form">
            <input type="text" placeholder="Enter email" class="subscribe__input">

            <button class="button">
              S'abonner
            </button>
          </form>
        </div>
      </div>
    </section>

    <!--==================== SPONSORS ====================-->
    <section class="sponsor section">
      <div class="sponsor__container container grid">
        <div class="sponsor__content">
          <img src="src/img/sponsors1.png" alt="" class="sponsor__img">
        </div>
        <div class="sponsor__content">
          <img src="src/img/sponsors2.png" alt="" class="sponsor__img">
        </div>
        <div class="sponsor__content">
          <img src="src/img/sponsors3.png" alt="" class="sponsor__img">
        </div>
      </div>
    </section>
  </main>

  <!--==================== FOOTER ====================-->
  <footer class="footer section">
    <?php include "./footer/footer.php"; ?>
  </footer>

  <!--========== SCROLL UP ==========-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-line scrollup__icon"></i>
  </a>

  <!--=============== SCROLL REVEAL===============-->
  <script src="src/js/scrollreveal.min.js"></script>

  <!--=============== SWIPER JS ===============-->
  <script src="src/js/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="src/js/main.js"></script>
</body>

</html>