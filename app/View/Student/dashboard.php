<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $model['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <style>
        .section-title {
            font-size: 1.25rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .divider {
            height: 2px;
            background-color: #007bff;
            margin: 10px 0;
        }

        .profile-img {
            width: 200px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            /* Sedikit rounding di ujung */
            margin-bottom: 10px;
        }

        .bg-light-blue {
            background-color: #e9f4ff;
        }

        .bg-dark-blue {
            background-color: #1d3c5b;
            color: white;
        }

        .card-media {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 100%;
            /* Membuat card menjadi persegi dengan rasio 1:1 */
        }

        .media-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar/video memenuhi area card */
            border-radius: 0.25rem;
            /* Tambahkan border-radius untuk gaya */
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background-color: #f8f9fa;
            /* Default background */
            aspect-ratio: 16 / 9;
            /* Ensure landscape ratio */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
            /* Smooth hover effect */
        }

        .gallery-item:hover img,
        .gallery-item:hover video {
            transform: scale(1.1);
            /* Slight zoom on hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://storage.googleapis.com/uqiacademytestbucket/img/logo_uqi.png" alt="UQI Academy Logo" width="auto" height="30" class="d-inline-block align-text-top">
                UQI Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"> <!-- Added id here -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/<?= $model["student"]->getId() ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-xl-10 col-xl-8 px-0 py-5">
        <div class="welcome-message text-center text-center py-5" style="margin-top: 56px;">
            <h5 class="display-4 fw-bold">Welcome to UQI Academy Student Portal</h1>
        </div>
        <div class="container my-5" id="cv-content">
            <h1 class="section-title text-center">Student Profile</h5>
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-md-4 bg-dark-blue text-white text-center p-4 rounded-start">
                        </br>
                        <?php if ($model["student"]->getPhoto() == "blank.jpg") { ?>
                            <img src="https://storage.googleapis.com/uqiacademytestbucket/img/blank.jpg" alt="Photo of <?= $model["student"]->getFullname() ?>" width="100" height="auto" class="img-fluid">
                        <?php } else { ?>
                            <img src="https://storage.googleapis.com/uqiacademytestbucket/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/' . $model["student"]->getPhoto() ?>" alt="Photo of <?= $model["student"]->getFullname() ?>" width="100" height="auto" class="img-fluid">
                        <?php } ?>
                        <h2 class="mb-3"><?= $model["student"]->getFullname() ?></h2>
                        <p><?= $model["student"]->getSpecialist() ?? "(edit your specialist)" ?></p>

                        <!-- Contact Info -->
                        <div class="mt-4 text-start">
                            <h5 class="fw-bold">Contact</h5>
                            <hr class="divider">
                            <p><i class="bi bi-telephone-fill"></i> <?= $model["student"]->getPhone() ?></p>
                            <p><i class="bi bi-envelope-fill"></i> <?= $model["student"]->getEmail() ?? "(edit your email)" ?></p>
                            <p><i class="bi bi-geo-alt-fill"></i> <?= $model["student"]->getAddress() ?></p>
                            <p><i class="bi bi-globe"></i><a target="_blank" href="<?= $model["student"]->getWebsite() ?>"> <?= "academy.uqistudios.com" . $model["student"]->getWebsite() ?? "(edit your website)" ?></a> </p>
                        </div>

                        <!-- Skills -->
                        <div class="mt-4 text-start">
                            <h5 class="fw-bold">Skills</h5>
                            <hr class="divider">
                            <ul class="list-unstyled">
                                <?php for ($i = 0; $i < sizeof($model["skills"]); $i++) { ?>
                                    <li class="d-flex justify-content-between">
                                        <span><?= $model["skills"][$i]->getSkill() ?></span>
                                        <span><?= $model["skills"][$i]->getScore() ?></span> <!-- Score untuk skill ini -->
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Languages -->
                        <div class="mt-4 text-start">
                            <h5 class="fw-bold">Languages</h5>
                            <hr class="divider">
                            <ul class="list-unstyled">
                                <?php for ($i = 0; $i < sizeof($model["languages"]); $i++) { ?>
                                    <li class="d-flex justify-content-between">
                                        <span><?= $model["languages"][$i]->getLanguage() ?></span>
                                        <span><?= $model["languages"][$i]->getScore() ?></span> <!-- Score untuk skill ini -->
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="mt-4 text-start">
                            <h5 class="fw-bold">Social Media</h5>
                            <hr class="divider">
                            <ul class="list-unstyled">
                                <?php for ($i = 0; $i < sizeof($model["socialMedias"]); $i++) {
                                    $platform = strtolower($model["socialMedias"][$i]->getPlatform());
                                    $url = $model["socialMedias"][$i]->getUrl();
                                ?>
                                    <li class="d-flex align-items-center mb-2">
                                        <span class="d-flex align-items-center">
                                            <?php if ($platform == "facebook") { ?>
                                                <i class="bi bi-facebook me-2"></i>
                                            <?php } else if ($platform == "instagram") { ?>
                                                <i class="bi bi-instagram me-2"></i>
                                            <?php } else if ($platform == "twitter") { ?>
                                                <i class="bi bi-twitter me-2"></i>
                                            <?php } else if ($platform == "linkedin") { ?>
                                                <i class="bi bi-linkedin me-2"></i>
                                            <?php } else if ($platform == "youtube") { ?>
                                                <i class="bi bi-youtube me-2"></i>
                                            <?php } else if ($platform == "tiktok") { ?>
                                                <i class="bi bi-tiktok me-2"></i>
                                            <?php } else if ($platform == "whatsapp") { ?>
                                                <i class="bi bi-whatsapp me-2"></i>
                                            <?php } else { ?>
                                                <i class="bi bi-globe me-2"></i>
                                            <?php } ?>
                                            
                                        </span>
                                        <a href="<?= $url ?>" target="_blank"><?= $url ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <!-- Main Content -->
                    <div class="col-md-8 bg-light-blue p-5 rounded-end">
                        <!-- Summary -->
                        <div class="mb-4">
                            <h5 class="section-title">Biography</h5>
                            <p><?= $model["student"]->getBio() ?></p>
                        </div>

                        <!-- Education Section -->
                        <div class="mb-4">
                            <h5 class="section-title">Educations</h5>
                            <?php for ($i = 0; $i < sizeof($model["educations"]); $i++) { ?>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="fw-bold mb-1"><?= $model["educations"][$i]->getType(). ' - ' . $model["educations"][$i]->getSchool() ?></h6>
                                        <p class="mb-0"><?= $model["educations"][$i]->getAddress() ?></p>
                                    <small><?= $model["educations"][$i]->getDescription() ?></small>
                                    </div>
                                    <small><?= $model["educations"][$i]->getEntryYear() ?> - <?= $model["educations"][$i]->getGraduateYear() ?></small>
                                </div>
                                <hr class="divider">
                            <?php } ?>
                        </div>

                        <!-- Experience Section -->
                        <div>
                            <h5 class="section-title">Experiences</h5>
                            <?php for ($i = 0; $i < sizeof($model["experiences"]); $i++) { ?>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="fw-bold mb-1"><?= $model["experiences"][$i]->getType() . ' - ' . $model["experiences"][$i]->getCompany() ?></h6>
                                        <p class="mb-0"><?= $model["experiences"][$i]->getAddress() ?></p>
                                        <p class="mb-0"><?= $model["experiences"][$i]->getWebsite() ?></p>
                                        <small><?= $model["experiences"][$i]->getDescription() ?></small>
                                    </div>
                                    <small><?= $model["experiences"][$i]->getEntryDate() ?> - <?= $model["experiences"][$i]->getEndDate() ?></small>
                                </div>
                                <hr class="divider">
                            <?php } ?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="container my-5">
            <h5 class="section-title text-center">Portofolio</h5>
            <div class="row g-3">
                <?php
                for ($i = 0; $i < sizeof($model["portofolios"]); $i++) {
                    if ($model["portofolios"][$i]->getType() == "image") { ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#mediaModal" data-type="image" data-src="https://storage.googleapis.com/uqiacademytestbucket/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $model["portofolios"][$i]->getId() . $model["portofolios"][$i]->getPortofolioName() ?>" alt="Image 1">
                                <img src="https://storage.googleapis.com/uqiacademytestbucket/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $model["portofolios"][$i]->getId() . $model["portofolios"][$i]->getPortofolioName() ?>" alt="Image 1">
                            </div>
                        </div>
                    <?php } else if ($model["portofolios"][$i]->getType() == "video") { ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#mediaModal" data-type="video" data-src="https://storage.googleapis.com/uqiacademytestbucket/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $model["portofolios"][$i]->getId() . $model["portofolios"][$i]->getPortofolioName() ?>" type="video/mp4">
                                <video muted>
                                    <source src="https://storage.googleapis.com/uqiacademytestbucket/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $model["portofolios"][$i]->getId() . $model["portofolios"][$i]->getPortofolioName() ?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>

        <!-- Modal for Media Popup -->
        <div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="mediaModalLabel">Full Media View</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Placeholder for dynamic content -->
                        <div id="modalContent"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Attach click event listener to gallery items
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.addEventListener('click', function() {
                    const type = this.getAttribute('data-type'); // Get the type (image/video)
                    const src = this.getAttribute('data-src'); // Get the source URL
                    const modalContent = document.getElementById('modalContent');

                    // Clear previous content
                    modalContent.innerHTML = '';

                    if (type === 'image') {
                        // Create an image element
                        const img = document.createElement('img');
                        img.src = src;
                        img.alt = 'Full Size Image';
                        img.className = 'img-fluid';
                        modalContent.appendChild(img);
                    } else if (type === 'video') {
                        // Create a video element
                        const video = document.createElement('video');
                        video.src = src;
                        video.controls = true;
                        video.autoplay = true;
                        video.className = 'w-100'; // Make it responsive
                        modalContent.appendChild(video);
                    }
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <footer class="bg-light text-center text-lg-start">
<!--            <div class="container p-4">-->
<!--                <section class="mb-4">-->
<!--                    <a class="btn btn-primary btn-lg m-1" href="https://www.facebook.com" role="button">Facebook</a>-->
<!--                    <a class="btn btn-primary btn-lg m-1" href="https://www.twitter.com" role="button">Twitter</a>-->
<!--                    <a class="btn btn-primary btn-lg m-1" href="https://www.instagram.com" role="button">Instagram</a>-->
<!--                </section>-->
<!--            </div>-->
            <div class="text-center p-3 bg-light">
                © 2024 UQI Academy
            </div>
        </footer>
</body>

</html>