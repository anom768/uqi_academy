<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>UQI Academy</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <!-- Template Config -->
    <link type="text/css" rel="stylesheet" href="/css/config.css">
    <!-- Libraries -->
    <link type="text/css" rel="stylesheet" href="/css/libs.css">
    <!-- Template Styles -->
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <!-- Responsive -->
    <link type="text/css" rel="stylesheet" href="/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" href="/img/favicon.png" sizes="32x32" />
    <style>
        p {
            margin-bottom: 2px;
        }

        .student-details {
            margin: 20px;
        }

        .student-details h1 {
            font-size: 48px;
            /* Atur ukuran sesuai kebutuhan, misalnya 28px */
            line-height: 1.2;
            /* Sesuaikan line-height agar lebih proporsional */
            margin-bottom: 10px;
            /* Sesuaikan margin bawah jika diperlukan */
        }

        .anita-page-title {
            font-size: 24px;
            margin-bottom: 20px;
            /* Tambahkan margin di bawah nama siswa */
        }

        /* Grid untuk dua kolom di bawah nama siswa */
        .student-info-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Kolom kiri dan kanan */
            gap: 20px;
            /* Jarak antara kolom kiri (data) dan kanan (social media) */
        }

        /* Kolom Kiri: Data Siswa */
        .student-info {
            display: grid;
            grid-template-columns: 100px 1fr;
            /* Kolom label dan data */
            gap: 10px;
        }

        .student-info dt {
            font-weight: bold;
        }

        .student-info dd {
            margin: 0;
        }

        /* Kolom Kanan: Link Media Sosial */
        .student-social-media dl {
            display: grid;
            grid-template-columns: 100px 1fr;
            /* Sama seperti data siswa */
            gap: 10px;
        }

        .student-social-media dt {
            font-weight: bold;
        }

        .student-social-media dd {
            margin: 0;
        }

        .student-social-media a {
            text-decoration: none;
            color: #007bff;
        }

        .student-social-media a:hover {
            text-decoration: underline;
        }

        /* Kurangi padding pada header jika terlalu tinggi */
        header.anita-header {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        /* Kurangi padding atau margin di bagian pertama page title */
        .anita-section {
            padding-top: 20px;
            /* Sesuaikan nilai */
        }

        /* Kurangi margin pada .anita-albums-back-wrap untuk mengurangi gap */
        .anita-albums-back-wrap {
            margin-top: 10px;
            /* Atur sesuai kebutuhan */
        }

        /* Kurangi margin atau padding antara section dan container */
        .anita-container {
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header id="anita-header" class="anita-header">
        <div class="anita-header-inner">
            <div class="anita-logo-wrapper">
                <!-- Logo -->
                <a href="" class="anita-logo is-retina">
                    <img src="/img/logo_uqi.png" alt="Anita Photography" width="192" height="80">
                </a>
            </div>
            <div class="anita-menu-wrapper">
                <!-- Menu Toggle Button -->
                <a href="#" class="anita-menu-toggler">
                    <i class="anita-menu-toggler-icon"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Fullscreen Menu -->
    <div class="anita-fullscreen-menu-wrap">
        <nav class="anita-nav anita-js-menu"></nav>
    </div>

    <!-- Page Background -->
    <div class="anita-page-background-wrap">
        <div class="anita-page-background" data-src="/img/uqi/academy/background.jpg" data-opacity="0.1"></div>
    </div>

    <!-- Page Main -->
    <main class="anita-main">

        <!-- Page Container -->
        <div class="anita-container">

            <!-- Page Title -->
            <section class="anita-section">
                <!-- <div class="anita-album-title"> -->
                <div class="anita-albums-back-wrap" data-aos="fade-up">
                    <a href="/" class="anita-albums-back">Back</a>
                </div>
                </br>
                <!-- Wrapper for name, photo, and other data -->
                <div class="student-info" style="display: flex; align-items: center; gap: 20px;">

                    <!-- Student Photo -->
                    <div class="student-photo" data-aos="fade-up">
                        <img src="/img/uqi/academy/2024/1/<?= $model["student"]->getPhoto() ?>" width="200" height="200" style="border-radius: 5%;">
                    </div>

                    <!-- Student Name and Details -->
                    <div class="student-details" data-aos="fade-up" data-aos-delay="50">
                        <!-- Nama Siswa -->
                        <h1 class="anita-page-title"><?= $model["student"]->getFullname() ?></h1>

                        <!-- Container untuk Data Siswa dan Media Sosial -->
                        <div class="student-info-container">
                            <!-- Kolom Kiri: Data Siswa -->
                            <div class="student-data">
                                <dl class="student-info">
                                    <dt>ID</dt>
                                    <dd><?= $model["student"]->getId() ?></dd>
                                    <dt>Phone</dt>
                                    <dd><?= $model["student"]->getPhone() ?></dd>
                                    <dt>School</dt>
                                    <dd><?= $model["student"]->getSchool() ?></dd>
                                    <dt>Address</dt>
                                    <dd><?= $model["student"]->getAddress() ?></dd>
                                </dl>
                            </div>

                            <!-- Kolom Kanan: Link Media Sosial -->
                            <div class="student-social-media">
                                <dl>
                                    <?php foreach ($model["socialMedias"] as $socialMedia) {?>
                                        <dt><?= $socialMedia->getPlatform() ?></dt>
                                        <dd><a href="<?= $socialMedia->getUrl() ?>" target="_blank"><?= $socialMedia->getUrl() ?></a></dd>
                                    <?php } ?>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="anita-post-meta anita-meta" data-aos="fade-up" data-aos-delay="100">
                        <span>Love Story</span>
                        <span>10 Photos</span>
                    </div> -->
                    <!-- </div> -->
                    <!-- .anita-album-title -->
                    <!-- <div class="anita-page-intro anita-offset-left--33 anita-offset--tablet-left--25" data-aos="fade-up" data-aos-delay="150">
                    <p>When you love someone, there is nothing else that matters. Take a look at this beautiful couple, where love takes the first place in their lives. They look so happy and bright, and they really are!</p>
                </div> -->
            </section>

            <!-- Page Content -->
            <section class="anita-section">
                <div class="anita-bricks-grid anita-bricks-2x3 anita-zoom-hover anita-item-zoom-hover anita-item-fade-hover">
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/01.jpg" alt="Photo 01" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/01.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/02.jpg" alt="Photo 02" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/02.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/03.jpg" alt="Photo 03" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/03.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/04.jpg" alt="Photo 04" width="1440" height="1080">
                            </div>
                            <a href="img/albums/album07/04.jpg" class="anita-lightbox-link" data-size="1440x1080"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/05.jpg" alt="Photo 05" width="1440" height="1080">
                            </div>
                            <a href="img/albums/album07/05.jpg" class="anita-lightbox-link" data-size="1440x1080"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/06.jpg" alt="Photo 06" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/06.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/07.jpg" alt="Photo 07" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/07.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/08.jpg" alt="Photo 08" width="1200" height="900">
                            </div>
                            <a href="img/albums/album07/08.jpg" class="anita-lightbox-link" data-size="1200x900"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/09.jpg" alt="Photo 09" width="1440" height="1080">
                            </div>
                            <a href="img/albums/album07/09.jpg" class="anita-lightbox-link" data-size="1440x1080"></a>
                        </div>
                    </div>
                    <!-- Gallery Item -->
                    <div class="anita-grid-gallery-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="anita-grid-item__inner">
                            <div class="anita-grid-item__image">
                                <img src="/img/null.png" class="anita-lazy" data-src="img/albums/album07/10.jpg" alt="Photo 10" width="1440" height="1080">
                            </div>
                            <a href="img/albums/album07/10.jpg" class="anita-lightbox-link" data-size="1440x1080"></a>
                        </div>
                    </div>
                </div>
                <!-- .anita-works-grid -->
            </section>

            <!-- Next Album Link -->
            <!-- <section class="anita-section">
                <div class="anita-next-album-wrap">
                    <div class="anita-next-album-title">
                        <h4 data-aos="fade-up" data-aos-offset="20">
                            Next Album
                        </h4>
                        <a href="albums-masonry-4col.html" class="anita-underline anita-caption" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                            Walking by Ocean
                        </a>
                        <div class="anita-page-background" data-src="img/albums/covers_512/album08.jpg"></div>
                    </div>
                </div>
            </section> -->
        </div>
        <!-- .anita-container -->
    </main>

    <!-- Footer -->
    <footer id="anita-footer">
        <div class="anita-footer-inner">
            <div class="anita-copyright anita-js-copyright"></div>
            <div class="anita-socials anita-js-socials"></div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="/js/lib/jquery.min.js"></script>
    <script src="/js/lib/aos.min.js"></script>
    <script src="/js/core.js"></script>
</body>

</html>